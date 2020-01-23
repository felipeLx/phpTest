<?php
    include 'config.php';
    $output='';

    if(isset($_POST['query'])) {
        $search=$_POST['query'];
        $stmt=$conn->prepare("SELECT name, phone FROM contacts WHERE name LIKE ?");
        $stmt->bind_param("ss",$search,$search);
    } else {
        $stmt->$conn->prepare("SELECT name, phone FROM contacts");
    }
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0){
        $output = "<thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Nome</th>
                            <th>Contato</th>
                        </tr>
                    </thead>
                    <tbody>";
                        while($row=$result->fetch_assoc()){
                            $output .="
                            <tr>
                                <td><img src="logo.png" alt="" height="30" /></td>    
                                <td><?=".$row['name']."</td>
                                <td><?=".$row['phone']."</td>
                            </tr>";
                        }
                        $output .="</tbody>";
                        echo $output;
    } else {
        echo "<p><strong>Não houve resultado para a busca</strong></p>";
    }
?>