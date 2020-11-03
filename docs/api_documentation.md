# API Documentation

## Product

### Endpoints

`GET /stores/{storeID}/products` 

Retrieves a list of products from the indicated store.

---

`GET /stores/{storeID}/products/{productID}`

Retrieves the indicated product from the indicated store.

---

### Product Attributes

`id` Integer, unique within a store.

`name` String, name of the product.

`prices` List of prices, each price contains a currency code and an amount.

`inventory_level` Integer, number of products in inventory.

`in_stock` Boolean, if the product is in stock.

`sizes` List of sizes the product comes in.

`colors` List of colors the product comes in.

`weight` The weight of the product.