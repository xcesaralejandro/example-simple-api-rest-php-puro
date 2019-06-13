<?php 
    require './db.php';

    function dd($var){
        echo '<pre style="height: 100% !important; overflow: scroll;">';
        die(print_r($var));
        echo '</pre>';
    }

    function dump($var){
        echo '<pre style="height: 100% !important; overflow: scroll;">';
        print_r($var);
        echo '</pre>';
    }

    function response ($code, $valid, $data = NULL, $message = NULL){
        $response = array(
            'code' => $code,
            'valid' => $valid,
            'data' => $data,
            'message' => $message
        );
        header('Content-Type: application/json;charset=utf-8'); 
        echo json_encode($response);
    }

    function validate_action_param(){
        $exists = isset($_REQUEST['action']);
        return $exists;
    }

    function validate_name_param(){
        $exists = isset($_REQUEST['name']);
        return $exists;
    }

    function validate_id_param(){
        $exists = isset($_REQUEST['id']);
        return $exists;
    }

    function get_users(){
        global $db;
        $sql="SELECT * FROM users";
        $stmt= $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function create_user($name){
        global $db;
        $sql ="INSERT INTO users (id, name) VALUES (?,?)";
        $stmt = $db->prepare($sql);
        $saved = $stmt->execute([NULL, $name]);
        return $saved;
    }

    function update_user($id, $name){
        global $db;
        $sql="update users set name = ? where id = ?";
        $stmt = $db->prepare($sql);
        $updated = $stmt->execute([$name,$id]);
        return $updated;
    }
    
    function delete_user($id){
        global $db;
        $sql="delete from users where id = ?";
        $stmt = $db->prepare($sql);
        $deleted = $stmt->execute([$id]);
        return $deleted;
    }

    function record_exists($id){
        global $db;
        $sql="SELECT * FROM users WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);
        $exists = $stmt->rowCount();
        return !!$exists; 
    }