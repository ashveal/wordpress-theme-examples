$(document).ready( function() {
	
	$(".clearit input, .clearit textarea, .clearit").live({
		focus: function() {
		    if( this.value == this.defaultValue ) {
				this.value = "";
			}
		},
		blur: function() {
		    if( !this.value.length ) {
				this.value = this.defaultValue;
			}
		}
	});
	
});