## Notes

---

Valid URLs for products are:

`/stores/1/products/632910392`

`/stores/1/products/921728736`

`/stores/2/products/799`

`/stores/2/products/794`

The data is from sample JSON from the Shopify and WooCommerce API documentation sites.

---

The work of normalizing the API structures is done by service classes found in `app/Services/Platforms/` which extend an abstract base class. These classes could also do the work of connecting to the external platform APIs if that was a requirement. Adding and removing e-commerce platforms would involve adding and removing these classes and coordinating the class names with the 'platform' field in the 'stores' table.

---

I didn't include pagination functionality for the lists of products, but it would be necessary for a real API.

---

Shopify weights, inventory and prices are nested within the product 'variants'. I took the last weight (which seems to be in pounds), all the prices (although they seem to be identical) and summed the inventory.

---

For WooCommerce it wasn't clear from the sample data what the weight units are or what currency the prices are in. 

Still for WooCommerce, I took the 'stock_quantity' to be the inventory level but both examples had 'null' here along with another field 'stock_status' = 'instock' so I added the boolean field 'in_stock' to address the question "are we out of stock?"

---

Returning HTML 404s because it was easy, would be nicer to return JSON

---