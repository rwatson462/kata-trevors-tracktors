# Improvements to make

1. Implement a Price class that holds both the price ex. vat _and_ the vat rate.
   * Price class should have methods for priceExTax and priceIncTax
   * Price class should be given Vat rate object during creation to calculate its prices.
2. Implement a TaxRate class so remove the hard-coded 15% values being used.
3. Update the Discount fetching to mirror that of ProductCatalog's private array (simulating a database call).
4. Update the Cart class so each time an item is added or removed from the basket, a recalculation of discounts is done.
  * Check when adding a product that it's has hint that it might qualify for a discount (use an Interface) to stop recursive checks when adding discount products.