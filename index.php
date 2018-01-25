    <!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    
    
    <body>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
            <?php
				require 'admin/database.php';
			 
                echo '<nav>
                        <ul class="nav nav-pills">';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                    else
                        echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
                }

                echo    '</ul>
                      </nav>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['id'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['id'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['id'] .'">';
                    
                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) 
                    {
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="images/' . $item['image'] . '" alt="...">
                                    <div class="price">' . number_format($item['price'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $item['name'] . '</h4>
                                        <p>' . $item['description'] . '</p>
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
                    }
                   
                   echo    '</div>
                        </div>';
                }
                Database::disconnect();
                echo  '</div>';
            ?>
        </div>
    </body>
</html>

<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/styles.css"
    </head>

    <body>
        <div class="container site">
            <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Burger Code <span class="glyphicon glyphicon-cutlery"></span></h1>
            <nav>
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="#1" data-toggle="tab">Menus</a></li>
                    <li role="presentation"><a href="#2" data-toggle="tab">Burgers</a></li>
                    <li role="presentation"><a href="#3" data-toggle="tab">Snacks</a></li>
                    <li role="presentation"><a href="#4" data-toggle="tab">Salades</a></li>
                    <li role="presentation"><a href="#5" data-toggle="tab">Boissons</a></li>
                    <li role="presentation"><a href="#6" data-toggle="tab">Desserts</a></li>
                </ul>
            </nav>
            <div class="tab-content">
                <div class="tab-pane active" id="1">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/m1.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/m2.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/m3.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/m4.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="2">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/b1.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/b2.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/b3.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/b4.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                    </div>   
                </div>
                <div class="tab-pane" id="3">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/s1.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/s2.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/s3.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/s4.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                    </div>   
                </div>
                <div class="tab-pane" id="4">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/sa1.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/sa2.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/sa3.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/sa4.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                    </div>   
                </div>
                <div class="tab-pane" id="5">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/bo1.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/bo2.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/bo3.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/bo4.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                    </div>   
                </div>
                <div class="tab-pane" id="6">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/d1.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/d2.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/d3.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="images/d4.png" alt="">
                                <div class="price">8.89</div>
                                <div class="caption">
                                    <h4>Menu Classic</h4>
                                    <p>Sandwich: Burger, Salad, Tomate, Cornichon + Frites + Boisson</p>
                                    <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                </div>
                            </div>    
                        </div>
                    </div>   
                </div>


            </div>
        </div>
    </body> -->
