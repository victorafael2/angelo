<div class="container">
    <h3>Formulário de Menu</h3>
    <form id="menuForm">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="menu_name">Nome do Menu</label>
                    <input type="text" class="form-control" id="menu_name" name="menu_name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="icone">Ícone</label>
                    <input type="text" class="form-control" id="icone" name="icone">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="breve">Ativar menu</label>
                    <select class="form-control" id="breve" name="breve">
                        <option value="">Escolher se o menu ficar ativo ou com a marcação de "Em breve"</option>
                        <option value="s">Sim</option>
                        <option value="n">Não</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>



    <hr>


    <form id="submenuForm">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="submenu_name">Nome do Submenu</label>
                    <input type="text" class="form-control" id="submenu_name" name="submenu_name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="submenu_link">Link do Submenu</label>
                    <input type="text" class="form-control" id="submenu_link" name="submenu_link">
                </div>
            </div>
            <div class="col-md-4">
                <label for="menu_id">ID do Menu</label>
                <select class="form-control" id="menu_id" name="menu_id">
                    <option>Selecione um menu</option>
                    <!-- Opções de seleção de menu serão adicionadas via JavaScript -->
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mostrar">Mostrar</label>

                    <select class="form-control" id="mostrar" name="mostrar">

                        <option value="s">Sim</option>
                        <option value="n">Não</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="ADM">ADM</option>
                        <option value="PERFIL">PERFIL</option>
                        <option value="NAV">NAV</option>
                        <option value="USER_GROUP">USER_GROUP</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="icone">Ícone</label>
                    <input type="text" class="form-control" id="icone" name="icone">
                </div>
            </div>

            <div class="col-md-4 d-none">
                <div class="form-group">
                    <label for="submenu_id">submenu_id</label>
                    <input type="text" class="form-control" id="submenu_id" name="submenu_id">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>

    <hr>


    <h3>Menus e Submenus</h3>
    <div id="menuSubmenuList" class="list-group">
    </div>


</div>

<script>
$(document).ready(function() {
    $('#menuForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'pages/cadastro/add/add_menu.php', // Altere para o arquivo que irá processar o salvamento
            data: $('#menuForm').serialize(),
            success: function() {
                Swal.fire('Sucesso', 'Menu salvo com sucesso!', 'success');
            },
            error: function() {
                Swal.fire('Erro', 'Ocorreu um erro ao salvar o menu.', 'error');
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
    // Carrega as opções do select de menu via AJAX
    $.ajax({
        type: 'GET',
        url: 'pages/cadastro/list/get_menu.php', // Altere para o arquivo que busca as informações dos menus
        success: function(data) {
            var menuSelect = $('#menu_id');
            data.forEach(function(menu) {
                menuSelect.append($('<option>', {
                    value: menu.menu_id,
                    text: menu.menu_name
                }));
            });
        }
    });

    $('#submenuForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'pages/cadastro/add/add_submenu.php', // Altere para o arquivo que irá processar o salvamento
            data: $('#submenuForm').serialize(),
            success: function() {
                Swal.fire('Sucesso', 'Submenu salvo com sucesso!', 'success');
            },
            error: function() {
                Swal.fire('Erro', 'Ocorreu um erro ao salvar o submenu.', 'error');
            }
        });
    });
});
</script>

<!-- pages/cadastro/list/buscar_menus_submenus.php -->

<script>
$(document).ready(function() {
    var isEditMode = false;

    // Carrega os menus e submenus via AJAX
    $.ajax({
        type: 'GET',
        url: 'pages/cadastro/list/buscar_menus_submenus.php', // Crie este arquivo para buscar os dados dos menus e submenus
        success: function(data) {
            var menuSubmenuList = $('#menuSubmenuList');
            data.forEach(function(menu) {
                var menuItem = $('<div>', {
                    class: 'list-group-item list-group-item-action',
                    html: '<h5 class="mb-1">' + menu.menu_name + '</h5>'
                });
                if (menu.submenus.length > 0) {
                    var submenuList = $('<ul>', {
                        class: 'list-group'
                    });
                    menu.submenus.forEach(function(submenu) {
                        var submenuItem = $('<li>', {
                            class: 'list-group-item d-flex justify-content-between align-items-center',
                            text: submenu.submenu_name
                        });
                        var actions = $('<div>', {
                            class: 'btn-group',
                            role: 'group'
                        });
                        var editButton = $('<button>', {
                            class: 'btn btn-info btn-sm',
                            text: 'Editar',
                            click: function() {
                                // Preencha o formulário com os valores do submenu
                                $('#submenu_id').val(submenu
                                .submenu_id);
                                $('#submenu_name').val(submenu
                                    .submenu_name);
                                $('#submenu_link').val(submenu
                                    .submenu_link);
                                $('#menu_id').val(submenu.menu_id);
                                $('#mostrar').val(submenu.mostrar);
                                $('#tipo').val(submenu.tipo);
                                $('#icone').val(submenu.icone);

                                // Atualize o texto do botão para "Atualizar"
                                $('#submitBtn').text('Atualizar');

                                // Defina a variável de modo de edição para true
                                isEditMode = true;

                                // Role a página até o formulário de edição
                                $('html, body').animate({
                                    scrollTop: $('#submenuForm')
                                        .offset().top
                                },
                                500); // Tempo da animação em milissegundos
                            }
                        });

                        var deleteButton = $('<button>', {
                            class: 'btn btn-danger btn-sm',
                            text: 'Apagar',
                            click: function() {
                                var submenuId = submenu.submenu_id;
                                $.ajax({
                                    type: 'POST',
                                    url: 'pages/cadastro/delete/apagar_submenu.php',
                                    data: {
                                        submenu_id: submenuId
                                    },
                                    success: function(
                                    response) {
                                        if (response ===
                                            'success') {
                                            // Recarregue a página ou atualize a lista após a exclusão bem-sucedida
                                            location
                                            .reload();
                                        } else {
                                            Swal.fire(
                                                'Erro',
                                                'Ocorreu um erro ao apagar o submenu.',
                                                'error');
                                        }
                                    },
                                    error: function() {
                                        Swal.fire('Erro',
                                            'Ocorreu um erro ao apagar o submenu.',
                                            'error');
                                    }
                                });
                            }
                        });

                        actions.append(editButton);
                        actions.append(deleteButton);
                        submenuItem.append(actions);
                        submenuList.append(submenuItem);
                    });
                    menuItem.append(submenuList);
                }
                menuSubmenuList.append(menuItem);
            });
        }
    });

    // Verifique se a âncora existe na URL e, se existir, mude o texto do botão para "Atualizar"
    if (window.location.hash === '#submenuForm') {
        $('#submitBtn').text('Atualizar');
        isEditMode = true; // Defina o modo de edição como true se a âncora existir
    }

    // Atualize o código de envio do formulário para diferenciar entre salvar e atualizar
    $('#submenuForm').submit(function(e) {
        e.preventDefault();

        if (isEditMode) {
            $.ajax({
                type: 'POST',
                url: 'pages/cadastro/update/update_submenu.php', // Arquivo para atualizar os dados do submenu
                data: $('#submenuForm').serialize(),
                success: function(response) {
                    if (response === 'success') {
                        Swal.fire('Sucesso', 'Submenu atualizado com sucesso!', 'success');
                        location.reload(); // Recarrega a página após a atualização
                    } else {
                        Swal.fire('Erro', 'Ocorreu um erro ao atualizar o submenu.',
                            'error');
                    }
                },
                error: function() {
                    Swal.fire('Erro', 'Ocorreu um erro ao atualizar o submenu.', 'error');
                }
            });
        } else {
            // Lógica de salvamento aqui
        }
    });

    // ...
});
</script>