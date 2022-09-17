<?php
// require_once("../config.php");


function products($id, $name, $price, $path)
{
    $product = "
        <form action=\"index.php\" class=\"food-card\" method=\"POST\">
                    <img src=\"$path\" alt=\"\">
                    <h4>$name</h4>
                    <input type=\"hidden\" name=\"productname\" value=\"$name\">
                    <input type=\"number\" name=\"productqty\" value=\"1\" min=\"1\">
                    <div class=\"card-foot\">
                        <h3>$price fcfa</h3>
                        <button class=\"btn f-btn\" type=\"submit\" name=\"submit\">Add to Cart</button>
                    </div>
                    <input type=\"hidden\" name=\"productid\" value=\"$id\">
                    <input type=\"hidden\" name=\"producprice\" value=\"$price\">
                    <input type=\"hidden\" name=\"producpath\" value=\"$path\">
                </form>
    ";

    echo $product;
}


function getProduct($img, $name, $id, $price, $qty)
{
    $output = "<div class=\"d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom bg-white p-3 mt-4 mobile\">
                    <div class=\"d-flex flex-row align-items-center\">
                        <div><img src=\"$img\" width=\"150\" height=\"150\" alt=\"\" id=\"image\"></div>
                        <div class=\"d-flex flex-column pl-md-3 pl-1\">
                            <div>
                                <h6>$name</h6>
                            </div>
                            <div>Art.No:<span class=\"pl-2\">$id</span></div>
                        </div>
                    </div>
                    <div class=\"pl-md-0 pl-1\"><b>$price XAF</b></div>
                    <div class=\"pl-md-0 pl-2\">
                        <a href=\"shoppingbag.php?minus=$id\">
                            <span class=\"fa fa-minus-square text-secondary minus\"></span>
                        </a>
                        <span class=\"px-md-3 px-1 number\">$qty</span>
                        <a href=\"shoppingbag.php?plus=$id\">
                            <span class=\"fa fa-plus-square text-secondary plus\"></span>
                        </a>
                        <input type=\"hidden\" name=\"qty\" class=\"qty\">
                    </div>
                    <div class=\"pl-md-0 pl-1\"><b>" . $price * $qty . "XAF</b></div>
                    <a href=\"shoppingbag.php?close=$id\">
                        <div class=\"close\">&times;</div>
                    </a>
                </div>";

    echo $output;
}
