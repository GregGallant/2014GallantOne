Portfolio = function(data) 
{   
        this.id = ko.observable(data.id);
        this.client_name = ko.observable(data.client_name);
        this.url = ko.observable(data.url);
        this.details = ko.observable(data.details);
        this.image = ko.observable(data.image);
        /* Pathing */
        this.imagePath = "/images/clients/"+data.image;
};  

var PortfolioController = function() {

    this.PortfolioService = function() 
    {
        var self = this;
        self.portfolioCards = ko.observableArray([]);

        $.getJSON("http://api.gallantone.com/portfolio", function(allData) {
            var mappedPortfolio = $.map(allData, function(item) { return new Portfolio(item) });
            self.portfolioCards(mappedPortfolio);
        });
    };


    this.slickify = function() {
        console.log("I AM TETSUO");
        
        $('.gallant_portfolio').slick({
            infinite: true 
        });
    }


    this.PortfolioService();

};

ko.applyBindings(new PortfolioController());

