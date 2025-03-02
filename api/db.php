<?php
session_start();
class DB{
    protected $table;
    protected   $pdo;
    protected   $dsn="mysql:host=localhost;charset=utf8;dbname=db03_z02l4;";
 public function __construct($table) {
    $this->table = $table;
    $this->pdo=new pdo($this->dsn,'root','');
}
    function fetchAll($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function fetchOne($sql){
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function a2s($array){
        $tmp=[];
        foreach ($array as $key => $val) {
            $tmp[]="`$key`='$val'";
        }
        return $tmp;
    }
    function all(...$array){
        $sql = " SELECT * FROM $this->table";
        if(!empty($array[0])){
            if(is_array($array[0])){
                $where= $this->a2s($array[0]);
                $sql .= " where ".join(" && ",$where);
            }else{
                $sql .= $array[0];
            }
        }if(!empty($array[1])){
            $sql .= $array[1];
        }
        return $this->fetchAll($sql);
    }
    function find($id){
        $sql = " SELECT * FROM $this->table";
        if(is_array($id)){
            $where=$this->a2s($id);
            $sql .= " where ".join(" && ",$where);
        }else{
            $sql .= " where `id`='$id' ";
        }
        return $this->fetchOne($sql);
    }
    function del($id){
        $sql = "DELETE FROM $this->table";
        if(is_array($id)){
            $where=$this->a2s($id);
            $sql .= " where ".join(" && ",$where);
        }else{
            $sql .= " where `id`='$id' ";
        }
        return $this->pdo->exec($sql);
    }
    function save($array){
        // update table set
        if(isset($array['id'])){
            $id=$array['id'];
            unset($array['id']);
            $set=$this->a2s($array);
            $sql = "UPDATE $this->table set".join(',',$set)." where `id`='$id' ";
        }else{
            // insert into table() values()
            $keys=array_keys($array);
            $sql = " INSERT INTO $this->table(`".join("`,`",$keys)."`) values('".join("','",$array)."')";
        }
        return $this->pdo->exec($sql);
    }
    function count(...$array){
        $sql = "SELECT count(*) FROM $this->table";
        if(!empty($array[0])){
            if(is_array($array[0])){
                $where= $this->a2s($array[0]);
                $sql .= " where ".join(" && ",$where);
            }else{
                $sql .= $array[0];
            }
        }if(!empty($array[1])){
            $sql .= $array[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

}
// DB外
function qCol($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=db03_z02l4;";
    $pdo=new pdo($dsn,'root','');
    return $pdo->query($sql)->fetchColumn();
}
function q($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=db03_z02l4;";
    $pdo=new pdo($dsn,'root','');
    return $pdo->query($sql)->fetchAll();
}   
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:".$url);
}

$User=new DB("user");
$Que=new DB("que");
$Log=new DB("log");
$News=new DB("news");
$Total=new DB("total");

if(!isset($_SESSION['total'])){

    $todey=date("Y-m-d");
    $chk=$Total->find(['date'=>$todey]);
    if($chk){
        $chk['total']++;
        $Total->save($chk);
    }else{
        $Total->save(['total'=>1,'date'=>$todey]);
    }
    $_SESSION['total']=1;
}