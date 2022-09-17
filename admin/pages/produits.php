<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>EAT & DRINK SHOP</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href=".././css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">

</head>

<body>

    <div class="container bg-white rounded-top mt-5" id="zero-pad">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-12 pt-3">
                <div class="d-flex">
                    <div class="pt-1">
                        <h4>EAT & DRINK SHOP</h4>
                    </div>

                    <div class="ml-auto p-2"><a href="#" class="text-dark text-decoration-none" id="mobile-font"> Bienvenue xxxx</a></div>
                    <div class="p-2"><a href="fonctions/logout.php" class="text-dark text-decoration-none a" id="mobile-font">Logout</a></div>


                </div>

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011-07-25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009-01-12</td>
                            <td>$86,000</td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>


    <script type="text/javascript" src="../../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>