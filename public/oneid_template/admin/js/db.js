(function($) {
  (function() {

    var db = {

      loadData: function(filter) {
        return $.grep(this.clients, function(client) {
          return (!filter.Name || client.Name.indexOf(filter.Name) > -1) &&
            (filter.Age === undefined || client.Age === filter.Age) &&
            (!filter.Address || client.Address.indexOf(filter.Address) > -1) &&
            (!filter.Country || client.Country === filter.Country) &&
            (filter.Married === undefined || client.Married === filter.Married);
        });
      },

      insertItem: function(insertingClient) {
        this.clients.push(insertingClient);
      },

      updateItem: function(updatingClient) {},

      deleteItem: function(deletingClient) {
        var clientIndex = $.inArray(deletingClient, this.clients);
        this.clients.splice(clientIndex, 1);
      }

    };

    window.db = db;


    db.countries = [{
        Name: "Мавжуд",
        Id: 1
      },
      {
        Name: "Мавжуд эмас",
        Id: 2
      }
    ];

    db.clients = [{
        "Name": "Болтабаев Форух",
        "Country": 1,
        "Address": "Мирзо Улуғбек т. Музработ кўчаси 16А уй",
      },
      {
        "Name": "Болтабаев Салохиддин",
        "Country": 2,
        "Address": "",
      }
    ];

  }());
})(jQuery);