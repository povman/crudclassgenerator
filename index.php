<?php
//error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
<META NAME="ROBOTS" CONTENT="NOINDEX, FOLLOW">
<META NAME="ROBOTS" CONTENT="INDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<title>Gerador de Classe</title>
	</head>
	<body>
	<div class="content">
	<div class="animated fadeIn">
	<div class="card"> 
	
	<div class="content">
                    <div class="animated fadeIn">
                        <div class="row">

                            <div class="col-md-11">
                                <div class="card">
                                    <div class="card-header">
                                    <a href="index.php"><button> Index </button></button> </a>
                            
		<br/>
		<form action="" method="GET">
		<div>
		<div> <h3>CRUD CLASS GENERATOR </h3> </div>
		<br/>
			Name of Class / file <br/>
			<input type="text" id="nome" name="nome" />
			<div>
			<br/>
			<div>
			Table Name<br/>
			<input type="text" id="tabela" name="tabela" />
			</div>
			<br/>
			<div>
			Fields ( comma separated )<br/>
			<input type="text" id="campos" name="campos" />
			</div>
			<br/>
			<div>
			<input type="reset" id="Reset" name="Reset" value="Reset" />
			<input type="submit" id="Enviar" name="Enviar" value="Create" />
			</div>
		</form>
		
		
		</div>
		
		</div>
		<div>After created click on Button Copy to copy or just copy and paste the code below</div>
		<div>
		
		<button onclick="CopyToClipboard('codeinput')"> <img src="copy.png"> Copy </button>

		</div>
		</div>
		</div>
		</div>
		</div>
		
		
	<hr>	

	<div class="content">
                    <div class="animated fadeIn">
                        <div class="row">

                            <div class="col-md-11">
                                <div class="card">
                                    <div class="card-header" id="codeinput">
                                    
    
		<?php
		$i=0;
$nome = $_GET['nome'];
$tabela = $_GET['tabela'];
$campos = $_GET['campos'];
$valores;

if(!empty($nome)){


echo "<p><?php </p>";
echo "<p>class " .ucfirst($nome) ." { </p>"	;
echo "<p>private \$table =  \"$tabela\"  ;</p>";

echo "<p>private ";
$arr = explode(",",$campos); // catch the fields 
$size = array_count_values($arr);
// cria o campo inserir
for($i = 0; $i < sizeof($size);$i++){
	if($i < sizeof($size) -1){
print_r("\$".$arr[$i] . ",");	
}else{
print_r("\$".$arr[$i] );
}
}
echo "; </p>";
echo "<p>private \$pdo ;</p>";
echo "<p>private \$logado = false;</p>";
echo "<p>public function __construct(){ </>
      <p>\$this->pdo =  new CRUD;</p>
    <p> } </p>"; 	
echo "<p>// inserir </p>";
echo "<p>public function inserir(";
for($i = 0; $i < sizeof($size);$i++){
	if($i < sizeof($size) -1){
print_r("\$".$arr[$i] . ",");	
}else{
print_r("\$".$arr[$i] );
}
}
echo "){</p>";
echo "<p>\$this->id = \$this->pdo->insert(\$this->table,";
// start the for stack
echo "\"";
for($i = 0; $i < sizeof($size);$i++){
	if($i < sizeof($size) -1){
print_r($arr[$i] . "=?,");	
}else{
print_r($arr[$i]. "=?" );
}
}
echo "\",array(";
// for instance from  array 
for($i = 0; $i < sizeof($size);$i++){
	if($i < sizeof($size) -1){
print_r("\$".$arr[$i] . ",");	
}else{
print_r("\$".$arr[$i] );
}
}
echo "));</p>";
echo "<p> \$this->logado = true;";
echo "<p>}</p>";

echo "// função atualizar";
echo "<p>public function atualizar(";
for($i = 0; $i < sizeof($size);$i++){
	if($i < sizeof($size) -1){
print_r("\$".$arr[$i] . ",");	
}else{
print_r("\$".$arr[$i] );
}
}
echo "){</p>";
echo "<p>\$this->id = \$this->pdo->update(\$this->table,";
// start the loop for 
echo "\"";
for($i = 0; $i < sizeof($size);$i++){
	if($i < sizeof($size) -1){
print_r($arr[$i] . "=?,");	
}else{
print_r($arr[$i]. "=?" );
}
}
echo " where $arr[0]=? \",array(";
// for instance from  array
for($i = 0; $i < sizeof($size);$i++){
	if($i < sizeof($size) -1){
print_r("\$".$arr[$i] . ",");	
}else{
print_r("\$".$arr[$i] );
}
}
echo "));</p>";
echo "<p> \$this->logado = true;";
echo "<p>}</p>";

echo "// função apagar";
echo "<p>public function apagar(\$$arr[0]){</p>";
echo "<p>\$this->id = \$this->pdo->delete(\$this->table,";
// inicia o laço do for 
echo "\"  where $arr[0]=? \",array(\$$arr[0]";
echo "));</p>";
echo "<p> \$this->logado = true;";
echo "<p>}</p>";

echo "//função usuario ";
echo "<p>public function usuario(\$$arr[0]){</p>";
    echo "<p>\$user = \$this->pdo->select('*',\$this->table,\"where $arr[0]=?\",array(\$$arr[0]));</p>";
    echo "<p>\$user = \$user->fetchAll();</p>";
    echo "<p>foreach (\$user as \$values){</p>";
// for instance from array 
for($i = 0; $i < sizeof($size);$i++){
print_r("\$this->".$arr[$i] . " = \$values['$arr[$i]']; <br/>");	

}
echo "<p>}</p>";
echo "<p> \$this->logado = (count (\$user) >0);";
echo "<p>}</p>";

echo "<br/>public function isLogado(){<br/>";
	echo "<br/>return \$this->logado;<br/>";
	echo "}";
//for from getter
for($i = 0; $i < sizeof($size);$i++){
	echo "<br/>public function get".ucfirst($arr[$i]). "(){<br/>";
	print_r("return \$this->".$arr[$i] . ";<br/> }");	
	
	}
echo "<p>}</p>";

}
		?>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		<!------------------------------------------------------------------->
		</div>
		</div>
		</div> <!-- div principal  -->
		

		<script>
		function CopyToClipboard(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("The code has been copied, now paste in your Editor")
  }
}
		</script>
		
	</body>
</html>
