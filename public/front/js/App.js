var LineItem = function(product_id, product_name, product_price, product_qty){
    this.id= product_id;
    this.name = product_name;
    this.price = product_price;
    this.qty= ko.observable(1);

    this.subtotal = ko.dependentObservable(function() {
        return(
            this.price * parseInt("0"+this.qty(), 10)
        ); 
    }, this);
};

var products = [
{id: 1, name: "Macbook Pro 15 inch", price: 1699.00},
{id: 2, name: "Mini Display Port to VGA Adapter", price: 29.00},
{id: 3, name: "Magic Trackpad", price: 69.00},
{id: 4, name: "Apple Wireless Keyboard", price: 79.00}
];

var cartItems = [];

var Cart = function(items){
    this.items = ko.observableArray();
    for(var i in items){
        var item = new LineItem(items[i].id, items[i].name, items[i].price);
        this.items.push(item);
    }
    this.remove = function(item){ this.items.remove(item); }
    this.add = function(item) {
        this.items.push(item);
    };
    this.total = ko.dependentObservable(function(){
    var total = 0;
    for (item in this.items()){
        total += this.items()[item].subtotal();
        }
        return total;
    }, this);
};

var cartViewModel = new Cart(products);
ko.applyBindings(cartViewModel);