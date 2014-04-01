$(document).foundation();

/* Pestañas que ocultan secciones */
// $(".seccion").each(function(){
// 	var self = $(this);
// 	self.find(".titulo")
// 	.css("cursor", "pointer")
// 	// TODO: Añadir tooltip a pestaña de sección
// 	// .attr("alt", "Haga clic para mostrar u ocultar la sección")
// 	.click(function(e){
// 		self.find(".cuerpo").slideToggle("slow");
// 		self.toggleClass("cerrada");
// 	});
// });



/* Funcionamiento de los filtros */
// $(".filtro-input").keyup(function(e){
// 	var filas = $(this).parent().parent().find(".filtro-tabla tr:not(.encabezados):not(.inmovil)");
// 	var val = $(this).val();
// 	if (val == "") {
// 		filas.show("fast");
// 		filas.parent().find(".no-resultados").remove();
// 	} else {
// 		var ocultasTodas = false;
// 		filas.each(function(){
// 			var colval = $(this).children("td:first").text().toLowerCase();
// 			if (colval.indexOf(val) == -1) {
// 				$(this).hide("fast");
// 				ocultasTodas = false;
// 			} else {
// 				$(this).show("fast");
// 				ocultasTodas = true;
// 			}
// 		});
// 		/* Mostrando que no hay filas */
// 		if (ocultasTodas) {
// 			if (filas.parent().find(".no-resultados").length == 0)
// 				$("<tr class='inmovil no-resultados'><td colspan='10'><span>El filtro no ha devuelto resultados.</span></td></tr>").appendTo(filas.parent());
// 		} else {
// 			filas.parent().find(".no-resultados").remove();
// 		}
// 	}
// })
// .on("search", this, function(){ $(this).keyup(); });

/* Confirmar eliminar */
$(".eliminar").click(function(e){
	if (!confirm("¿Confirma que desea eliminar?")) e.preventDefault();
});