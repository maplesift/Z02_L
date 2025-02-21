<?php 
session_start();


class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db03_z02_l;";
    protected $pdo;
    protected $table;

    public function __construct($table) {
        $this->table = $table;
        $this->pdo=new PDO($this->dsn,'root','');
    }
    function fetchAll($sql) {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function fetchOne($sql) {   
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
        $sql = "SELECT * FROM $this->table";
        if(!empty($array[0])){
            if(is_array($array[0])){
                $where= $this->a2s($array[0]);
                $sql .= " where ".join(" && ",$where);
            }else{
                $sql .= $array[0];
            }
            
        }
        if(!empty($array[1])){
        
        $sql .= $array[1];
        }
    return $this->fetchAll($sql);
    } 
    
    // function all(...$arg){
    //     $sql="SELECT * FROM $this->table ";
    //     if(!empty($arg[0])){
    //         if(is_array($arg[0])){

    //             $where=$this->a2s($arg[0]);
    //             $sql=$sql . " WHERE ". join(" && ",$where);
    //         }else{
    //             // $sql=$sql.$arg[0];
    //             $sql .= $arg[0];
    //         }
    //     }
    //     if(!empty($arg[1])){
    //         $sql=$sql . $arg[1];
    //     }
    //     // echo "all:".$sql;
    //     return $this->fetchAll($sql);
    // }


    function find($id){
        $sql = "SELECT * FROM $this->table";
        if(is_array($id)){
            $where = $this->a2s($id);
            $sql .= " where ".join(" && ",$where);
        }else{
            $sql .= " where `id`='$id' ";
        }
        return $this->fetchOne($sql);
    }
    function del($id){
        $sql = "DELETE FROM $this->table";
        if(is_array($id)){
            $where = $this->a2s($id);
            $sql .= " where ".join(" && ",$where);
        }else{
            $sql .= " where `id`='$id' ";
        }
        return $this->pdo->exec($sql);
    }
    function save($array){
        //id: update table set
        if(isset($array['id'])){
            $id=$array['id'];
            unset($array['id']);
            $where = $this->a2s($array);
            $sql = " UPDATE $this->table set".join(',',$where)." where `id`='$id'";  
        }else{
            //!id: insert into table() values()
            $keys=array_keys($array);
            $sql = " INSERT INTO $this->table (`".join("`,`",$keys)."`) VALUES('".join("','",$array)."') ";
        }
        // echo $sql;
        // $cols=array_keys($array);
        // $sql="INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";

            return $this->pdo->exec($sql);
        // return $this->pdo->exec($sql);
    }
    function count(...$array){
        $sql = "SELECT count(*) FROM $this->table";
        if(!empty($array[0]) && is_array($array[0])){
            $where= $this->a2s($array[0]);
            $sql .= " where ".join(" && ",$where);
        }else{
            $sql .= $array[0];
        }if(!empty($array[1])){
            $sql .= $array[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }
    


}
// DB外
function q($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=db03_z02_l;";
    $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll();
}
function qCol($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=db03_z02_l;";
    $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchColumn();
}
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:".$url);
}

$Total=new DB('total');
$User=new DB('users');
// $Total=new DB('total');


// 如果沒有
if(!isset($_SESSION['total'])){
    // 如果有今天的紀錄
    if($Total->count(['date'=>date("Y-m-d")])>0){
        $total=$Total->find(['date'=>date("Y-m-d")]);
        $total['total']++;
        $Total->save($total);
        // 如果沒有
    }else{
        $Total->save(['date'=>date("Y-m-d"),'total'=>1]);
    }
    $_SESSION['total']=1;
}