$('#search-button').on('click', function() {
    let searchTerm = $('#status').val();
    $.ajax({
      type: 'POST',
      url: 'your_search_script.php',
      data: { search: searchTerm },
      success: function(response) {
        // Atualiza a página com os resultados
        $('#results-container').html(response);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });