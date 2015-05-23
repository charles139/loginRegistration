<?php
class LoginDB extends CI_Model {
     function add_user($users)
     {
         $query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
         $values = array($users['first_name'], $users['last_name'], $users['email'], $users['password'], 'NOW()', 'NOW()' ) ; 
         return $this->db->query($query, $values);
     }
     function get_user($login)
     {
         $oldies = $this->db->query("SELECT * FROM users WHERE email = '" . $login['email'] . "' AND password = ".$login['password'])->row_array();
         // var_dump($oldies);
         // die;
         $session_oldies = $this->session->userdata('existing_users');
         

         if ($oldies)
             {
                 for ($i = 0 ; $i < 1 ; $i++)
                 {
                    if($oldies['email'] === $session_oldies['email'] && $oldies['password'] === $session_oldies['password'] )
                    {
                        $this->session->set_userdata('users' , $oldies);
                        $this->load->view('welcome');
                    }
                    else
                    {
                        redirect('/Login/error');   
                    }
                 }
             }
         else 
         {
            redirect('/Login/error');
         }
     }
 }
?>