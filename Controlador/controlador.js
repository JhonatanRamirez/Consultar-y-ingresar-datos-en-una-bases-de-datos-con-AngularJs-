var app= angular.module('myApp',[]);
app.controller('control', function($scope, $http){

$scope.actual = {};

$scope.consultarUsuario = function()
	{
	$http.post('Modelo/getUsuarios.php').success(function(data){
		$scope.posts=data;
	});
}

	$scope.registrar = function()
	{
		
		var url = 'Modelo/setUsuarios.php';
		console.log("cedula " + $scope.actual.cedula);
		console.log("email " + $scope.actual.email);
		console.log("nombre " + $scope.actual.nombre);
		console.log("tipo_ usuario "+ $scope.actual.tipo_usuario);


	var conAjax=	$http.post(url,{'cedula':$scope.actual.cedula,'email':$scope.actual.email, 'nombre':$scope.actual.nombre,'tipo':$scope.actual.tipo_usuario}) .success(function(respuesta){

				$scope.consultarUsuario();


               // console.log(respuesta);
            });


}

})