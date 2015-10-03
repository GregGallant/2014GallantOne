module.exports = {

    // This loads mock data into localStorage
    init: function() {

        localStorage.clear();

        localStorage.setItem('product', JSON.stringify([
                {
                    id: '00001',
                    name: 'First Crud Product',
                    image: 'crud.png',
                    description: 'This is what Lumen will provide',
                    variants: [
                        {
                            sku: '123123',
                            type: 'product',
                            price: 3.00,
                            inventory: 1
                        },
                        {
                            sku: '224222',
                            type: 'multiproduct',
                            price: 5.00,
                            inventory: 3
                        }
                    ]
                }
            ])
        )


    }


};
