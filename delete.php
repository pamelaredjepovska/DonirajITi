<?php 
session_start();
if(!isset($_GET['postid']))
{
    header("Location:error.php");
}
$id = $_SESSION['id'];

require('database.php');
$postid = mysqli_real_escape_string($conn,$_GET['postid']);
$query = "SELECT * FROM objavi WHERE Objava_ID = $postid";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)==0)
{
    header("Location:error.php"); //prenasocuvanje dokolku baranata objava ne postoi
}
else {
    $row = mysqli_fetch_array($result);
    if($row['KorisnikID'] != $id)
    {
        header("Location:error.php"); //prenasocuvanje dokolku objavata ne e na momentalno logiraniot korisnik
    }
    else 
	{
        $query1 = "DELETE FROM objavi WHERE Objava_ID = $postid";
        if(mysqli_query($conn,$query1))
        {
            header("Location: userpanel.php");
        }
    }

}



?>