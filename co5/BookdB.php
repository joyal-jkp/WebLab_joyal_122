<html>
    <head>
        <title>
            Library
        </title>
    </head>
    <body>
        <form action=""method="POST">
        <table align="center">
            <tr>
                <td>Accession number</td>
                <td><input type="text" name="acno"></td>
            </tr>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td>Edition</td>
                <td><input type="text" name="edition"></td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td><input type="text" name="pubsher" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="SUBMIT" name="submit"></td>
            </tr>
        </table>
        </form>
        <form method="POST">
            <table align="center">
                <tr>
                    <td>Search here:</td>
                   <td> <input type="text" name="title1" placeholder="Search with title"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="search" name="search"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","book_db");
if(isset($_POST["submit"]))
{
    $acno=$_POST['acno'];
    $title=$_POST['title'];
    $author=$_POST['author'];
    $edition=$_POST['edition'];
    $pubsher=$_POST['pubsher'];
    $query="INSERT INTO`tbl_details`(`acno`, `title`, `author`, `edition`, `pubsher`) VALUES ('$acno','$title','$author','$edition','$pubsher')";
    if(mysqli_query($conn,$query))
    {
        echo "Succefully Inserted";
    }
}
if(isset($_POST['search']))
{
    $title1=$_POST['title1'];
    $query1="SELECT * FROM `tbl_details` WHERE `title`='$title1'";
    $data=mysqli_query($conn,$query1);
    if(mysqli_num_rows($data)==0)
    {
        echo "Book not found";
    }
    else
    {
    echo "<html><table align='center' border='1'><tr bgcolor='cyan'><th>Acc No</th><th>Title</th><th>Author</th></tr>";
    $res=mysqli_fetch_assoc($data);
    echo "<tr bgcolor='#B2BEB5'><td>".$res['acno']."</td><td>".$res['title']."</td><td>".$res["author"]."</td></tr>";
    echo "</table></html>";
    }
}