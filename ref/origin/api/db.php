<?php
session_start();


class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db003";
    protected $pdo;
    protected $table;
    static public $type=[
        1=> '健康新知',
        2=> '菸害防治',
        3=> '癌症防治',
        4=> '慢性病防治',
    ];


    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    /**
     * 撈出全部資料
     * 1. 整張資料表
     * 2. 有條件
     * 3. 其他SQL功能
     */
    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(!empty($arg[0])){
            if(is_array($arg[0])){

                $where=$this->a2s($arg[0]);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                // $sql=$sql.$arg[0];
                $sql .= $arg[0];

            }
        }

        if(!empty($arg[1])){
            $sql=$sql . $arg[1];
        }
        // echo "all:".$sql;
        return $this->fetchAll($sql);
    }

    function find($id){
        $sql="SELECT * FROM $this->table ";

        if(is_array($id)){
            $where=$this->a2s($id);
            $sql=$sql . " WHERE ". join(" && ",$where);
        }else{
            $sql .= " WHERE `id`='$id' ";
        }
        // echo "find:".$sql;
        return $this->fetchOne($sql);
    }

    function save($array){

        if(isset($array['id'])){
            //update
            //update table set `欄位1`='值1',`欄位2`='值2' where `id`='值' 
            $id=$array['id'];
            unset($array['id']);
            $set=$this->a2s($array);
            $sql ="UPDATE $this->table SET ".join(',',$set)." where `id`='$id'";
        }else{
            //insert
            $cols=array_keys($array);
            $sql="INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";
        }
        
        // echo $sql;
        return $this->pdo->exec($sql);
    }
    
    function del($id){
        $sql="DELETE FROM $this->table ";

        if(is_array($id)){
            $where=$this->a2s($id);
            $sql=$sql . " WHERE ". join(" && ",$where);
        }else{
            $sql .= " WHERE `id`='$id' ";
        }

        //echo $sql;
        return $this->pdo->exec($sql);
    }

    
    /**
     * 把陣列轉成條件字串陣列
     */
    
    function a2s($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        // dd($tmp);
        return $tmp;
    }
    /**
     * 方便使用各個聚合函式
     */
    
     protected function math($math,$col='id',$where=[]){
        $sql="SELECT $math($col) FROM $this->table";

        if(!empty($where)){
            $tmp=$this->a2s($where);
            $sql=$sql . " WHERE " . join(" && ", $tmp);
        }
        // **********
        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
    }

    function max($col,$where=[]){
        return $this->math('max',$col,$where);
    }
    function sum($col,$where=[]){
        return $this->math('sum',$col,$where);
    }
    function min($col,$where=[]){
        return $this->math('min',$col,$where);
    }
    function avg($col,$where=[]){
        return $this->avg('avg',$col,$where);
    }
    function count($where=[]){
        return $this->math('count','*',$where);
    }

    /**
     * 取得單筆資料
     */
    protected function fetchOne($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * 取得多筆資料
     */
    protected function fetchAll($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    


}

function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db003",'root','');
    // echo $sql;
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


$Total=new DB('total');
$User=new DB('users');
$News=new DB('news');
$Que=new DB('que');
$Log=new DB('log');

// 如果沒有
if(!isset($_SESSION['total'])){
    // 如果有今天的紀錄
    if($Total->count(['date'=>date("Y-m-d")])>0){
    $total=$Total->find(['date'=>date("Y-m-d")]);
        $total['total']++;
        $Total->save($total);
        // 如果沒有今天的紀錄
    }else{
        $Total->save(['date'=>date("Y-m-d"),'total'=>1]);
    }
    $_SESSION['total']=1;
}