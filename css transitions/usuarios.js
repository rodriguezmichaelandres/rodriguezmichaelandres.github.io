function obtenerListaUsuarios()
{
	var listaUsuarios = JSON.parse(localStorage.getItem('listaUsuariosLs'));
	
	if(listaUsuarios == null)
	{
		listaUsuarios = 
		[
			//id  name    lastname		email		pass	  birth		  rol
			['1', 'Pabs', 'Monestel', 'a@gmai.com', '12345', '20-06-94', '1'],
			['2', 'Juan', 'Perez', 'g@gmail.com', '789456', '13-05-1996','2']
		]
	}
	return listaUsuarios;
}

function validarCredenciales(pCorreo, pContrasena)
{
	var listaUsuarios = obtenerListaUsuarios();
	var bAcceso = false;
	
	for (var i = 0; i < listaUsuarios.length; i++)
	{
		if(pCorreo == listaUsuarios[i][3] && pContrasena == listaUsuarios[i][4])
		{
			bAcceso = true;
			sessionStorage.setItem('usuarioActivo', listaUsuarios[i][1] + ' ' + listaUsuarios[i][2]);
			sessionStorage.setItem('rolUsuarioActivo', listaUsuarios[i][6]);
		}
	}
	return bAcceso;
}