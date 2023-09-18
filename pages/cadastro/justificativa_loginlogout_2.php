<?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;
use fileuploader\server\FileUploader;
use phpformbuilder\database\DB;

/* =============================================
    start session and include form class
============================================= */


include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/Form.php';

// include the fileuploader

include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/plugins/fileuploader/server/class.fileuploader.php';

/* =============================================
    validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('fg-form')) {
    // create validator & auto-validate required fields
    $validator = Form::validate('fg-form');

    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['fg-form'] = $validator->getAllErrors();
    } else {
        $uploaded_files = [];
        if (isset($_POST['uploader-1']) && !empty($_POST['uploader-1'])) {
            $posted_file = FileUploader::getPostedFiles($_POST['uploader-1']);
            $uploaded_files['uploader-1'] = [
                'upload_dir' => '/home/phpformbuilder/public_html/phpformbuilder/plugins/fileuploader/default/php/../../../../../file-uploads/',
                'filename' => $posted_file[0]['file']
            ];
        }
        include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/database/db-connect.php';
        include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/database/DB.php';

        $db = new DB();
        // Insert a new record
        $values = array(
            'select-1' => $_POST['select-1'],
            'input-2' => $_POST['input-2'],
            'input-2' => $_POST['input-2'],
            'input-3' => $_POST['input-3'],
            'textarea-1' => $_POST['textarea-1'],
            'input-4' => $_POST['input-4'],
            'uploader-1' => $uploaded_files['uploader-1']['filename']
        );
        if (!$db->insert('', $values)) {
            $msg = Form::buildAlert($db->error(), 'bs5', 'danger');
        } else {
            $id  = $db->getLastInsertId();
            $msg = Form::buildAlert('1 Record inserted ; id = #' . $id, 'bs5', 'success');
        }
        // clear the form
        Form::clear('fg-form');
    }
}

/* ==================================================
    The Form
 ================================================== */

$form = new Form('fg-form', 'vertical', 'novalidate, data-fv-no-icon=true', 'bs5');
// $form->setMode('development');
$form->addHeading('Formuário de Justificativas', 'h1', '');
$form->addOption('select-1', 'option-1', 'Option 1', '', '');
$form->addOption('select-1', 'option-2', 'Option 2', '', '');
$form->addSelect('select-1', 'Colaborador', 'required=required,class=select2,data-close-on-select=true,data-dropdown-auto-width=true,data-minimum-results-for-search,data-tags=true,data-theme=default');
$form->addInput('date', 'input-2', '', 'Data', '');
$form->addInput('time', 'input-2', '', 'Hora inicio', '');
$form->addInput('time', 'input-3', '', 'Hora fim', '');
$form->addTextarea('textarea-1', '', 'Descrição', '');
$form->addInput('text', 'input-4', '', 'adicionado por', 'readonly=readonly');

// Prefill upload with existing file
$current_file = ''; // default empty

$current_file_path = '../../../../../file-uploads/';

/* INSTRUCTIONS:
    If you get a filename from your database or anywhere
    and want to prefill the uploader with this file,
    replace "filename.ext" with your filename variable in the line below.
*/
$current_file_name = 'filename.ext';

if (file_exists($current_file_path . $current_file_name)) {
    $current_file_size = filesize($current_file_path . $current_file_name);
    $current_file_type = mime_content_type($current_file_path . $current_file_name);
    $current_file = array(
        'name' => $current_file_name,
        'size' => $current_file_size,
        'type' => $current_file_type,
        'file' => $current_file_path . $current_file_name, // url of the file
        'data' => array(
            'listProps' => array(
                'file' => $current_file_name
            )
        )
    );
}

$fileUpload_config = array(
    'upload_dir'    => '../../../../../file-uploads/',
    'limit'         => 3,
    'file_max_size' => 5,
    'debug'         => true
);
$form->addFileUpload('uploader-1', '', 'Upload 1', '', $fileUpload_config, $current_file);
$form->centerContent();
$form->addBtn('submit', 'button-1', '', '<i class="fa-solid fa-check" aria-hidden="true"></i> Button', 'class=btn btn-success');
$form->centerContent(false);
$form->addPlugin('formvalidation', '#fg-form', 'default', array('language' => 'pt_BR'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Php Form Builder - Bootstrap 5 form</title>
    <meta name="description" content="">

    <!-- Bootstrap 5 CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- font-awesome -->

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <?php $form->printIncludes('css'); ?>
</head>

<body>

    <h1 class="text-center">Php Form Builder - Bootstrap 5 form</h1>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-11 col-lg-10">
                <?php
                if (isset($msg)) {
                    echo $msg;
                }
                $form->render();
                ?>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    $form->printIncludes('js');
    $form->printJsCode();
    ?>

</body>

</html>
