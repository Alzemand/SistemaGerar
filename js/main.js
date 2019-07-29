(function ($) {
  "use strict";

  // Preloader (if the #preloader div exists)
  $(window).on('load', function () {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function () {
        $(this).remove();
      });
    }
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Header scroll class
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  // Smooth scroll for the navigation and links with .scrollto classes
  $('.main-nav a, .mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if (! $('#header').hasClass('header-scrolled')) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.main-nav, .mobile-nav').length) {
          $('.main-nav .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Navigation active state on scroll
  var nav_sections = $('section');
  var main_nav = $('.main-nav, .mobile-nav');
  var main_nav_height = $('#header').outerHeight();

  $(window).on('scroll', function () {
    var cur_pos = $(this).scrollTop();
  
    nav_sections.each(function() {
      var top = $(this).offset().top - main_nav_height,
          bottom = top + $(this).outerHeight();
  
      if (cur_pos >= top && cur_pos <= bottom) {
        main_nav.find('li').removeClass('active');
        main_nav.find('a[href="#'+$(this).attr('id')+'"]').parent('li').addClass('active');
      }
    });
  });

  // jQuery counterUp (used in Whu Us section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });

  // Porfolio isotope and filter
  $(window).on('load', function () {
    var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item'
    });
    $('#portfolio-flters li').on( 'click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');
  
      portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

})(jQuery);

// Notificações 

function notify(mensagem, tipo, tempo){
    
  // se houver outro alert desse sendo exibido, cancela essa requisição
  if($("#message").is(":visible")){
      return false;
  }

  // se não setar o tempo, o padrão é 5 segundos
  if(!tempo){
      var tempo = 5000;
  }

  // se não setar o tipo, o padrão é alert-info
  if(!tipo){
      var tipo = "info";
  }

  // monta o css da mensagem para que fique flutuando na frente de todos elementos da página
  var cssMessage = "display: block; position: fixed; top: 9%; left: 20%; right: 20%; width: 60%; padding-top: 10px; z-index: 9999";
  var cssInner = "margin: 0 auto; box-shadow: 1px 1px 3px blue;";

  // monta o html da mensagem com Bootstrap
  var dialogo = "";
  dialogo += '<div id="message" style="'+cssMessage+'">';
  dialogo += '    <div class="alert alert-'+tipo+' alert-dismissable" style="'+cssInner+'">';
  dialogo += '    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>';
  dialogo +=          mensagem;
  dialogo += '    </div>';
  dialogo += '</div>';

  // adiciona ao body a mensagem com o efeito de fade
  $("body").append(dialogo);
  $("#message").hide();
  $("#message").fadeIn(200);

  // contador de tempo para a mensagem sumir
  setTimeout(function() {
      $('#message').fadeOut(300, function(){
          $(this).remove();
      });
  }, tempo); // milliseconds

}

//Confirmar exclusão 

function excluirAluno(x){
  var resultado = confirm("Confirmar a exclusão do aluno?");
  if (resultado == true){
      var link = "/SistemaGerar/php/alunoapagar.php?cpf=";
      link = link.concat(x);
      window.location.href = link;
  }
}

function excluirInstrutor(x){
  var resultado = confirm("Confirmar a exclusão do instrutor?");
  if (resultado == true){
      var link = "/SistemaGerar/php/instrutorapagar.php?cpf=";
      link = link.concat(x);
      window.location.href = link;
  }
}

function excluirEmpresa(x){
  var resultado = confirm("Confirmar a exclusão da empresa?");
  if (resultado == true){
      var link = "/SistemaGerar/php/empresaapagar.php?cnpj=";
      link = link.concat(x);
      window.location.href = link;
  }
}

function excluirCurso(x){
  var resultado = confirm("Confirmar a exclusão do curso?");
  if (resultado == true){
      var link = "/SistemaGerar/php/cursoapagar.php?id=";
      link = link.concat(x);
      window.location.href = link;
  }
}

function excluirTurma(x){
  var resultado = confirm("Confirmar a exclusão da turma?");
  if (resultado == true){
      var link = "/SistemaGerar/php/turmaapagar.php?codturma=";
      link = link.concat(x);
      window.location.href = link;
  }
}

// Mascara formulário

$('.telefone').mask('(00) 000000000');
$('.dinheiro').mask('#.##0,00', {reverse: true});
$('.cpf').mask('000.000.000-00');
$('.cnpj').mask('00.000.000/0000-00');
$('.rg').mask('00.000.000-0');
$('.cep').mask('00000-000');
$('.data').mask('00/00/0000');
