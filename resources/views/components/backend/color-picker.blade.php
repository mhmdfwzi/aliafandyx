
          <style>
                    input{
          display: block;
          width: 50%;
          float: left;
          height: 80px;
        }
        
        input[type="text"] {
          padding: 20px;
        }
        
        input[type="text"]:invalid{
          outline: 2px solid red;
        }
        
        body {
          font-size: 30px; 
          padding: 3em;
          display: flex;
          min-height: 100vh;
          justify-content: center;
          align-items: center;
        }
                    
          </style>
</head>

<body>
          
          <input type="color" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55">

          <input type="text"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55" id="hexcolor"></input>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script >
          $('#colorpicker').on('input', function() {
	$('#hexcolor').val(this.value);
});
$('#hexcolor').on('input', function() {
  $('#colorpicker').val(this.value);
});
</script>
