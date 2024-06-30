import mysql.connector

# Configurações do banco de dados local
local_db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'katrina_dev'
}

local_connection = mysql.connector.connect(**local_db_config)
local_cursor = local_connection.cursor()

# Configurações do banco de dados na nuvem
cloud_db_config = {
    'host': '89.116.186.150',
    'user': 'katrina_dev',
    'password': 'katrina!#10devBetter10',
    'database': 'katrina_dev'

}

cloud_connection = mysql.connector.connect(**cloud_db_config)
cloud_cursor = cloud_connection.cursor()

# Obter lista de tabelas no banco de dados local
local_cursor.execute("SHOW FULL TABLES WHERE TABLE_TYPE='BASE TABLE';")
local_tables = [table[0] for table in local_cursor.fetchall()]

# Verificar e criar tabelas na nuvem se necessário
for table in local_tables:
    # Verificar se a tabela existe na nuvem
    cloud_cursor.execute(f"SHOW TABLES LIKE '{table}';")
    table_exists = cloud_cursor.fetchone()

    if not table_exists:
        # Obter a estrutura da tabela no banco de dados local
        local_cursor.execute(f"SHOW CREATE TABLE {table};")
        create_table_query = local_cursor.fetchone()[1]

        # Criar a tabela na nuvem
        cloud_cursor.execute(create_table_query)
        print(f"Tabela {table} criada na nuvem.")
    else:
        print(f"Tabela {table} já existe na nuvem.")

    # Obter lista de colunas na tabela de origem
    local_cursor.execute(f"SHOW COLUMNS FROM {table};")
    local_columns = local_cursor.fetchall()

    # Obter lista de colunas na tabela de destino na nuvem
    cloud_cursor.execute(f"SHOW COLUMNS FROM {table};")
    cloud_columns = cloud_cursor.fetchall()

    # Converter a lista de colunas em um conjunto para facilitar a comparação
    cloud_column_names = {column[0] for column in cloud_columns}

    # Adicionar colunas ausentes na tabela de destino na nuvem
    for column in local_columns:
        if column[0] not in cloud_column_names:
            column_name = column[0]
            column_type = column[1]
            alter_query = f"ALTER TABLE {table} ADD COLUMN {column_name} {column_type};"
            cloud_cursor.execute(alter_query)
            print(f"Adicionada coluna {column_name} à tabela {table} na nuvem com tipo {column_type}.")

# Salvar as alterações no banco de dados na nuvem
cloud_connection.commit()

# Fechar as conexões
local_connection.close()
cloud_connection.close()
