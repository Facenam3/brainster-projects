<?php

require_once("./conect.php");
$query = "SELECT * FROM message";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/8c0d052db3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Students</title>
</head>

<body class="bg-warning">
    <nav>
        <div class="wrapper">
            <a href="../index.html" class="logo">
                <img src="../images/Logo.png" alt="logo" />
                Brainster
            </a>
            <ul>
                <li>
                    <a href="https://brainster.co/marketing/" target="_blank">Академија за маркетинг</a>
                </li>
                <li>
                    <a href="https://brainster.co/full-stack/" target="_blank">Академија за програмирање</a>
                </li>
                <li>
                    <a href="https://brainster.co/data-science/" target="_blank">Академија за data science</a>
                </li>
                <li>
                    <a href="https://brainster.co/graphic-design/" target="_blank">Академија за дизајн</a>
                </li>
            </ul>
            <a href="../contact.html" class="btn">Вработи наш студент</a>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </div>
    </nav>
    <div class="mobile-nav">
        <div class="inner">
            <ul>
                <li>
                    <a href="https://brainster.co/marketing/" target="_blank">Академија за маркетинг</a>
                </li>
                <li>
                    <a href="https://brainster.co/full-stack/" target="_blank">Академија за програмирање</a>
                </li>
                <li>
                    <a href="https://brainster.co/data-science/" target="_blank">Академија за data science</a>
                </li>
                <li>
                    <a href="https://brainster.co/graphic-design/" target="_blank">Академија за дизајн</a>
                </li>
            </ul>
            <a href="#" class="btn">Вработи наш студент</a>
        </div>
    </div>
    <div class="container-fluid students-container bg-warning">
        <div class="row my-5">
            <div class="card bg-warning ">
                <div class="card-header bg-dark text-white">
                    <h2 class="display-6 text-center">Успешно е внесено вашето барање за одредениот студент</h2>
                </div>
                <div class="card-body  text-white">
                    <table class="table table-bordered text-center my-5">
                        <thead>
                            <tr>
                                <th>Број</th>
                                <th>Име и презиме</th>
                                <th>Име на компанија</th>
                                <th>Контакт имејл</th>
                                <th>Контакт телефон</th>
                                <th>Тип на студенти</th>
                            </tr>
                        </thead>
                        <tbody class="my-5">
                            <tr class="bg-warning">
                                <?php

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                    <td><?php echo $row['company_email']; ?></td>
                                    <td><?php echo $row['company_number']; ?></td>
                                    <td><?php echo $row['students']; ?></td>


                            </tr>

                        <?php
                                }

                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>
            Изработено со <span><i class="fa-solid fa-heart"></i></span> од
            студентите на Brainster
        </p>
    </footer>
    <script src="./js/contact.js"></script>


    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>