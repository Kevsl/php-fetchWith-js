<?php 
   if(isset($_POST)){
      $data = file_get_contents("php://input");
      $user = json_decode($data, true);
      $file = "./user.csv";
      $fp = fopen($file, 'a');

       $row_count = 0;
        if (($handle = fopen($file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $row_count++;
            }
            fclose($handle);
        }

        // Determine the next ID based on the count of rows
        $next_id = $row_count + 1;
         
      $name = htmlspecialchars(strip_tags(trim($user["name"])));
      $email = htmlspecialchars(strip_tags(trim($user["email"])));
      $password = htmlspecialchars(strip_tags(trim($user["password"])));
      $id = rand(1,100);

      $row=[$next_id,$name,$email,$password];
      fputcsv($fp,$row);
      echo $user;
      fclose($fp);

    }