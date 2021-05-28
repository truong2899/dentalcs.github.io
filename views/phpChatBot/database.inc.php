<?php
class getData
{
    public function ketnoi_csdl()
    {
        $con=mysqli_connect('localhost', 'root', '', 'dentalcs');
        if (!$con) {
            die('connect database failed');
            exit();
        } else {
            return $con;
        }
    }

    public function fetch_user_chat_history($id_user)
    {
        $con = $this->ketnoi_csdl();
        $result=mysqli_query($con, "select * from user_answer where id_user = ".$id_user." ");
        if (mysqli_num_rows($result)>1) {
            $alldata = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $res = array_filter($alldata);
            $html .=' <ul class="list-unstyled messages-list">';
            foreach ($res as $row) {
                $message=$row['type'];
                $type=$row['ofuser'];
                if ($type=='user') {
                    $class="messages-me";
                    $imgAvatar="user_avatar.png";
                    $name="Me";
                } else {
                    $class="messages-you";
                    $imgAvatar="bot_avatar.png";
                    $name="Chatbot";
                }
                if ($name == 'Chatbot') {
                    $html .= '<li class="'.$class.' clearfix"  style = "float:right"><img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle" width="50px"></li>';
                    $html.= '<li class="messages-you clearfix" style = "margin-left:520px"><span class="message-img" style="float:right" ></span><div class="message-body clearfix" style="float:right"><p class="messages-p" style="font-size:20px">'.$message.
                    '</p></div></li>';
                } else {
                    $html.='<li class="'.$class.' clearfix" ><span class="message-img"></span><div class="message-body clearfix"><div class="message-header"> <small class="time-messages text-muted"><span class="fas fa-time"></span></small> </div><p class="messages-p" style="font-size:20px"><img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle" style ="margin-right:10px;width:50px">'.$message.'</p></div></li>';
                }
            }
            $html .= '</ul>';
            return $html;
        } else {
            mysqli_query($con, "insert into user_answer(ten_trieuchung,type,ofuser,id_user) values('','Bạn gặp vấn đề gì về răng ?','bot',$id_user)");
            $result=mysqli_query($con, "select * from user_answer where id_user = ".$id_user."");
            $alldata = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $res = array_filter($alldata);
            $html .=' <ul class="list-unstyled messages-list">';
            foreach ($res as $row) {
                $message=$row['type'];
                $type=$row['ofuser'];
                if ($type=='user') {
                    $class="messages-me";
                    $imgAvatar="user_avatar.png";
                    $name="Me";
                } else {
                    $class="messages-you";
                    $imgAvatar="bot_avatar.png";
                    $name="Chatbot";
                }
                if ($name == 'Chatbot') {
                    $html .= '<li class="'.$class.' clearfix"  style = "float:right"><img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle" width="50px"></li>';
                    $html.= '<li class="messages-you clearfix" style = "margin-left:520px"><span class="message-img" style="float:right" ></span><div class="message-body clearfix" style="float:right"><p class="messages-p" style="font-size:20px">'.$message.
                    '</p></div></li>';
                } else {
                    $html.='<li class="'.$class.' clearfix" ><span class="message-img" ></span><div class="message-body clearfix"><div class="message-header"> <strong class="messages-title"></strong> </div><p class="messages-p" style="font-size:20px"><img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle" >'.$message.'</p></div></li>';
                }
            }
            $html .= '</ul>';
            $result1 = mysqli_query($con, "select id,type from answer where id_question = 1");
            $alldata1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
            $res1 = array_filter($alldata1);
            
            foreach ($res1 as $row) {
                $ketqua = $row['type'];
                $id = $row['id'];
                $html.= '<input id = "input-me'.$id.'" name = "ans[]" style="margin-left:10px"  class = "ans"  type="button" class="btn btn-primary" value="'.$ketqua.'"   onclick="send_msg('.$id.');"/>';
            }

           
            return $html;
        }
    }

    //function get answer
    public function getAnswer($id_question)
    {
        $con = $this->ketnoi_csdl();
        if ($id_question != 1) {
            $result = mysqli_query($con, "select  id,type  from answer  where id_question = (select id from question where id = '$id_question' ) ");
            $alldata = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $res = array_filter($alldata);

            foreach ($res as $row) {
                $results = $row['type'];
                $id = $row['id'];
                $html.= '<input id = "input-me'.$id.'" name = "ans[]" class = "ans"  type="button" class="btn btn-primary" value="'.$results.'"   onclick="send_msg('.$id.');"/>';
            }
            return  $html;
        }
        /*         if ($id_question == 1) {
                    $result = mysqli_query($con, "select content from  answer  where id_question = 1 ");
                    $alldata = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $res = array_filter($alldata);
                    $i = 0;

                    foreach ($res as $row) {
                        $results = $row['content'];
                        $i++;
                        $html.= '<input id = "input-me'.$i.'" name = "ans[]" class = "ans"  type="button" class="btn btn-primary" value="'.$results.'"   onclick="send_msg('.$i.');"/>';
                        return $html;
                        mysqli_close($con);
                        unset($_SESSION['idQuestion']);
                    }
                } */
            
          
        
        /*  unset($_SESSION['question']); */
    }
    //function get question
    public function getQuestion($answer, $id_user, $id_answer)
    {
        $con = $this->ketnoi_csdl();
        $sql = "select id,content from question where id = (select id_question_after from answer where id = '$id_answer') ";
    
        $res=mysqli_query($con, $sql);
        if (mysqli_num_rows($res)>0) {
            $row = mysqli_fetch_assoc($res);
            $result = $row['content'];

           

            $id  = $row['id'];
            
            $html .= '<ul class="list-unstyled messages-list">';
            $html .=
            '<li class="messages-you clearfix" style = "padding-left:600px"><span class="message-img" ></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes"></span></small> </div><p class="messages-p">' .
            $result .
            '<img src="image/'.$imgAvatar.'" class="avatar-sm rounded-circle" ></p></div></li>';
            $html .= '</ul>';
            /*  $html .= '<input type="text" class="custId" name="custId" value="'.$id.'" />'; */
            /* $re = mysqli_query($con, "select content from  answer  where id_question = (select id from question where id = '".$id."' ) ");
            $row1 = mysqli_fetch_assoc($re);
            $rs1 = $row1['content'];


            $html .= '<input id = "input-me1" name = "ans" class = "ans"  type="button" class="btn btn-primary" value="'.$rs1.'"   onclick="send_msg(1);"/>';
            */

            $getObjec = mysqli_query($con, "select ten_trieuchung from c_object where id = (select id_CObject from answer where id = '$id_answer')");
            $row_1 = mysqli_fetch_assoc($getObjec);
            $result_1 = $row_1['ten_trieuchung'];

            if ($answer == "Đau răng" || $answer == "Mất răng" || $answer == "Có lỗ sâu" || $answer == "Răng không đau") {
                mysqli_query($con, "insert into user_answer(ten_trieuchung,type,ofuser,id_user) values('$answer','$answer','user',$id_user)");
            } else {
                mysqli_query($con, "insert into user_answer(ten_trieuchung,type,ofuser,id_user) values('$result_1','$answer','user',$id_user)");
            }
            
 
            mysqli_query($con, "insert into user_answer(ten_trieuchung,type,ofuser,id_user) values('','$result','bot',$id_user)");
            session_start();
            $_SESSION['idQuestion'] = $id;
            return $html;
        } else {
            $getObjec = mysqli_query($con, "select ten_trieuchung from c_object where id = (select id_CObject from answer where id = '$id_answer')");
            $row_1 = mysqli_fetch_assoc($getObjec);
            $result_1 = $row_1['ten_trieuchung'];
            mysqli_query($con, "insert into user_answer(ten_trieuchung,type,ofuser,id_user) values('$result_1','$answer','user',$id_user)");

            $result =mysqli_query($con, "select * from user_answer where id_user = $id_user and ofuser = 'user'");

            $data = "" ;
            while ($row= mysqli_fetch_array($result)) {
                $trieuchung = $row['ten_trieuchung'];
                $type = $row['type'];
                $data = $data.$trieuchung.":".$type."&";
            }

           
            $end = mysqli_query($con, 'select * from rule where type like "%'.$data.'%" ');
            if (mysqli_num_rows($end)>0) {
                $row1 = mysqli_fetch_assoc($end);
                $result1 = $row1['ketluan_benh'];
                /*  $html.= '<h4 align="center" style = "font-size:25px;"><strong>Tôi chuẩn đoán bạn đã mắc '.$result1.'!</strong></h4>'; */
                $string = "Tôi chuẩn đoán bạn đã mắc ".$result1;
                mysqli_query($con, "insert into user_answer(ten_trieuchung,type,ofuser,id_user) values('','$string','bot_ketluan',$id_user)");
                return $html;
            } else {
                mysqli_query($con, "insert into user_answer(ten_trieuchung,type,ofuser,id_user) values('','Bạn đã mắc bệnh lạ!'.$data.'','bot',$id_user)");
                $row1 = mysqli_fetch_assoc($end);
                $result1 = $row1['ketluan_benh'];
                $html.= '<h4 align="center" style = "font-size:30px;">Bạn đã mắc bệnh lạ!'.$data.'</h4>';
                return $html;
            }
        }
    }
}
