<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>学生信息管理</title>
	</head>
	<body>
		<center>
			<?php 
                include("menu.php"); //导入导航栏 
              //连接数据库
                try{
                    $pdo=new PDO("mysql:host=localhost;dbname=stud","root","klive");
                    $pdo->exec("set names utf8");
                }catch(PDOException $e){
                    echo "数据数连接失败".$e->getMessage();
                }
                
                //4. 根据参数a的值执行对应的操作
                switch($_GET['a']){
                    case "insert": //执行添加
                        //拼装添加sql语句
                        $sql = "insert into stu values(null,:name,:age,:sex,:classid)";
                       //返回预处理
                        $si=$pdo->prepare($sql);
                        //绑定数组($data)
                        //获取要添加的信息
                        $data[':name'] = $_POST['name'];
                        $data[':age'] = $_POST['age'];
                        $data[':sex'] = $_POST['sex'];
                        $data[':classid'] = $_POST['classid'];
                        //执行插入
                        $si->execute($data);
                        //判断是否成功（根据刚刚自增id号值）
                        if($pdo->lastInsertId()>0){
                            echo "添加成功！";
                        }else{
                            echo "添加失败！";
                        }
                        break;
                    
                    case "update": //执行修改
                        $data[':id'] = $_POST['id'];
                        
                        //拼装修改sql语句
                        $sql = "update stu set name=:name,age=:age,sex=:sex,classid=:classid where id=:id";
                        // echo $sql;die;
                       //返回预处理
                        $su=$pdo->prepare($sql);
                        //绑定值
                        //获取要修改的信息
                        $data[':name'] = $_POST['name'];
                        $data[':age'] = $_POST['age'];
                        $data[':sex'] = $_POST['sex'];
                        $data[':classid'] = $_POST['classid'];
                       //执行
                        $su->execute($data);
                        //判断是否成功（根据刚刚执行sql语句的影响行数）
                        if($su->rowCount()>0){
                            echo "修改成功！";
                        }else{
                            echo "修改失败！";
                        }
                        break;
                    
                    case "del": //执行删除
                        //拼装删除sql语句
                        $sql = "delete from stu where id=?";
                        //返回预处理
                        $sd=$pdo->prepare($sql);
                        //绑定值
                        $sd->bindValue(1,$_GET['id']);
                        //执行
                        $sd->execute();
                        
                        echo "删除成功！";
                        break;
                }
            ?>
		</center>
	</body>
</html>

