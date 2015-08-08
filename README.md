# PHP Server to work with Falcor

This is a starting point for creating a php server to work with Falcor.

## Laravel Route Example

```
use Illuminate\Http\Request;
use App\Domain\FalcorHttpDataSource;
use App\Domain\FalcorRouter;

Route::get('model.json', function(Request $request){

	return new FalcorHttpDataSource($request, new FalcorRouter([
	    [
	      // match a request for the key "greeting"    
	      "route" => "greeting",
	      // respond with a PathValue with the value of "Hello World."
	      "get" => [
	        	"path" => ["greeting"], 
	        	"value" => "Hello World"
	      ]
	    ],
	    [ 
	      "route" => "testgreeting",
	      "get" => [
	        	"path" => ["testgreeting"], 
	        	"value" => "Hello Brenley"
	      ]
	    ],
	]));

});
```

## Example HTML

```
<html>
  <head>
    <script src="./js/vendor/falcor.browser.min.js"></script>
    <script>
      var model = new falcor.Model({source: new falcor.HttpDataSource('/model.json') });
      
      // retrieve the "greeting" key from the root of the Virtual JSON resource
      model.
        get("greeting").
        then(function(response) {
          document.write(response.json.greeting);
        }, function(error) {
          console.log(error);
        });
    </script>
  </head>
  <body>
  </body>
</html>
```
