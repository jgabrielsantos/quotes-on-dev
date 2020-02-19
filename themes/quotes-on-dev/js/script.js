(function($) {
    $('.new-quote').on('click', function(event) {

      event.preventDefault();
      $.ajax({
        method: 'get',
        url: red_vars.rest_url + 'wp/v2/posts?filter[posts_per_page]=1&filter[orderby]=rand',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
        }
      }
      ).done(function(data) {
        event.preventDefault();
        var author = data[0].title.rendered;
        var link =  data[0].slug;
        var post_content = data[0].content.rendered;
        history.pushState(null, null, link);

        $('.author').text(author);
        $('.post_content').html(post_content);
      
      });
    });

    document.addEventListener( 'wpcf7mailsent', function( submit ) {
      submit.preventDefault();

      let newQuote = {
          'title': $( 'input[name=\'author\']' ).val(),
          'content': $( 'textarea[name=\'quote\']' ).val(),
          '_qod_quote_source': $( 'input[name=\'source\']' ).val(),
          '_qod_quote_source_url': $( 'input[name=\'source-url\']' ).val(),
          'status': 'publish'
      };

      $.ajax({
          method: 'POST',
          url: red_vars.rest_url + 'wp/v2/posts',
          context: document.body,
          data: newQuote,
          beforeSend: function(xhr) {
              xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
          }
      }).done(function(data) {
          window.location.href = data.link;
      })
      .fail(function() {
        alert('Quote not submited. Please try again.');
      });

      }, false );

  })(jQuery);