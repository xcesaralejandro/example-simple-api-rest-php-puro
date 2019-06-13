<?php 
    require_once './lib.php';

    $ok = validate_action_param();

    if(!$ok){
        return response(404, false, null, 'Param: "action" is required');
    }
    
    $action = $_REQUEST['action'];
    switch ($action){
        case 'show':
            $users = get_users();
            return response(200, true, $users, 'Get data collection was successful');
        break;

        case 'create':
            $ok = validate_name_param();
            if(!$ok){
                return response(404, false, null, 'Param: "name" is required');
            }
            $name = $_REQUEST['name'];
            $created = create_user($name);
            $message = $created ? 'User was created' : 'User could not be created';
            return response(200, $created, null, $message);
        break;

        case 'update':
            $ok = validate_name_param() && validate_id_param();
            $id = $_REQUEST['id'];
            if(!record_exists($id)){
                return response(404, false, null, 'Record not found');
            }else if(!$ok){
                return response(404, false, null, 'Param "name" is required');
            }
            $name = $_REQUEST['name'];
            $updated = update_user($id, $name);
            $message = $updated ? 'User was updated' : 'User could not be updated';
            return response(200, $updated, null, $message);
        break;

        case 'delete':
            $ok = validate_id_param();
            $id = $_REQUEST['id'];
            if(!$ok){
                return response(404, false, null, 'Param "id" is required');
            }else if(!record_exists($id)){
                return response(404, false, null, 'Record not found');
            }
            $deleted = delete_user($id, $name);
            $message = $deleted ? 'User was deleted' : 'User could not be deleted';
            return response(200, $deleted, null, $message);
        break;

        default:
            return response(200, false, null, "Action isn't supported");
        break;
    }