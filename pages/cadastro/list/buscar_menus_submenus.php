<?php
// Conexão com o banco de dados (substitua pelas suas configurações)
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta SQL para buscar informações dos menus e submenus
$sql = "SELECT m.menu_name, s.submenu_id, s.submenu_name, s.submenu_link, s.menu_id, s.mostrar, s.tipo, s.icone FROM menu m
LEFT JOIN submenu s ON m.menu_id = s.menu_id";
$result = $conn->query($sql);

$menuData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menuName = $row['menu_name'];
        $submenuId = $row['submenu_id'];
        $submenuName = $row['submenu_name'];
        $submenuLink = $row['submenu_link'];
        $menuId = $row['menu_id'];
        $mostrar = $row['mostrar'];
        $tipo = $row['tipo'];
        $icone = $row['icone'];

        if (!isset($menuData[$menuName])) {
            $menuData[$menuName] = array(
                'menu_name' => $menuName,
                'submenus' => array()
            );
        }

        if (!empty($submenuName)) {
            $menuData[$menuName]['submenus'][] = array('submenu_id' => $submenuId,
            'submenu_name' => $submenuName,
            'submenu_link' => $submenuLink,
            'menu_id' => $menuId,
            'mostrar' => $mostrar,
            'tipo' => $tipo,
            'icone' => $icone);
        }
    }
}

// Fecha a conexão com o banco de dados
$conn->close();

// Retorna os resultados como JSON
header('Content-Type: application/json');
echo json_encode(array_values($menuData));
?>
