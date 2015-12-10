<!DOCTYPE html>
<html>
    <head>
        <title>Flora Registry</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
    </head>
    <body>


        <div class="container">


        </div>
            <div class="content">
                <form>

                     <img src="img/soil_types.jpg" alt="soil types" width="200" height="252">
                     <br>
                     <br>
                    <!-- Soil Type Radio group START!-->
                    <div class="form-group"> 
                        <label class="control-label"><h3>Soil Type</h3></label>
                        <div class="radio">
                          <label>
                            <input type="radio" name="soil" value="peaty">
                            Peaty
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio"  name="soil" value="loamy">
                            Loamy
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio"  name="soil" value="sandy">
                            Sandy
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio"  name="soil" value="chalky">
                            Chalky
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio"  name="soil" value="clay">
                            Clay
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio"  name="soil" value="silty">
                            Silty
                          </label>
                        </div>
                    </div>      
                    <!-- Soil Type Radio Group END !-->


                    <div class="form-group"> <!-- Submit button !-->
                        <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
</html>