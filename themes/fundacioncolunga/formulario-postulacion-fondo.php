<?php
/*
Template Name: Page Template - Formulario Postulación Convocatoria
*/

$current = 'convocatorias';
$title = get_the_title();
$titulo_imagen = get_field('titulo_imagen');
$imagen_destacada = get_field('imagen_destacada');
$texto_imagen = get_field('texto_imagen');

include('header.php');

?>
  <div class="slide box-align-down first">
    <div class="cont-img-slider">
      <a href="#">
        <?php $url_imagen_destacada = $imagen_destacada['sizes']['w1600']; ?>
        <img src="<?php echo $url_imagen_destacada; ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-10">
              <div class="slider-txt-content">
                <h1 class="title line-title pink"><?php echo $titulo_imagen; ?></h1>
                <p>
                  <?php echo $texto_imagen; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>

  <section id="postulacion" class="postulacion">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1>Completa la siguiente información</h1>

          <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; endif;
           ?>
        </div>
      </div>
    </div>
  </section>

  <style>
    .gform_body iframe {
      width: 100%;
      height: 78px;
      max-width: 100%;
    }
  </style>

<script type="text/javascript">
/* inicio textareacount*/
!function(t){t.fn.textareaCount=function(o,r){var l,c=t(this),u=0,s=o.maxCharacterSize,f=0,h=0,d={};function p(r){var a,e=0;for(a=0;a<r.length;a++)"\n"===r.charAt(a)&&e++;return e}function g(){return-1!==navigator.appVersion.toLowerCase().indexOf("win")}function m(r){return(r+" ").replace(/^[^A-Za-z0-9]+/gi,"").replace(/[^A-Za-z0-9]+/gi," ").split(" ")}function z(r){return r.length-1}function a(){var r,a,e,t,n=c.val(),i=("function"==typeof o.charCounter?o.charCounter:d[o.charCounter])(n);return 0<o.maxCharacterSize?(o.truncate&&i>=o.maxCharacterSize&&(n=n.substring(0,o.maxCharacterSize)),r=p(n),a=o.maxCharacterSize,g()&&(a=o.maxCharacterSize-r),o.truncate&&a<i&&(e=this.scrollTop,c.val(n.substring(0,a)),this.scrollTop=e),l.removeClass(o.warningStyle+" "+o.errorStyle),a-i<=o.warningNumber&&l.addClass(o.warningStyle),a-i<=0&&l.addClass(o.errorStyle),u=i,g()&&(u=i+r),h=z(m(c.val())),f=s-u):(r=p(n),u=i,g()&&(u=i+r),h=z(m(c.val()))),t=(t=(t=o.displayFormat).replace("#input",u)).replace("#words",h),0<s&&(t=(t=t.replace("#max",s)).replace("#left",f)),t}function e(){return l.html(a()),void 0!==r&&r.call(this,{input:u,max:s,left:f,words:h}),!0}d.standard=function(r){return r.length},d.twitter=function(r){var a=Array(23).join("*"),e=new RegExp("(https?://)?([a-z0-9+!*(),;?&=$_.-]+(:[a-z0-9+!*(),;?&=$_.-]+)?@)?([a-z0-9-.]*)\\.(travel|museum|[a-z]{2,4})(:[0-9]{2,5})?(/([a-z0-9+$_-]\\.?)+)*/?(\\?[a-z+&$_.-][a-z0-9;:@&%=+/$_.-]*)?(#[a-z_.-][a-z0-9+$_.-]*)?","gi");return r.replace(e,a).length},o=t.extend({maxCharacterSize:-1,truncate:!0,charCounter:"standard",originalStyle:"originalTextareaInfo",warningStyle:"warningTextareaInfo",errorStyle:"errorTextareaInfo",warningNumber:20,displayFormat:"#input characters | #words words"},o),t("<div class='charleft'>&nbsp;</div>").insertAfter(c),(l=c.next(".charleft")).addClass(o.originalStyle),c.bind("keyup",function(){e()}).bind("mouseover paste",function(){setTimeout(function(){e()},10)})}}(jQuery);
/* fin textareacount */
</script>

<?php include('footer.php'); ?>
