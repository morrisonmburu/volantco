@include("settings.includes.head")
@include("dashboard.includes.nav")

@yield("content")

{{-- @include("dashboard.includes.footer") --}}
<script type="text/javascript">
	// Page full screen
 function toggleScreen(){
    if (!document.fullscreenElement) {
      document.documentElement.requestFullscreen();
      $("#icon").attr('data-icon','feather:minimize');
	  } else {
	    if (document.exitFullscreen) {
	      document.exitFullscreen();
	    }
	  }
  };

  if (document.fullscreenElement) {
      $("#icon").attr('data-icon','feather:minimize'); 
	  }else{
	     $("#icon").attr('data-icon','feather:maximize'); 
	}

</script>