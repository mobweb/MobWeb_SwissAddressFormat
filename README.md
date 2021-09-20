# MobWeb_SwissAddressFormat

A simple extension for Magento 2 (tested on 2.4.3) that changes the address format to match the requirements for Switzerland:

- Moves the ZIP before the city
- Removes the region
- Moves the company to the top

The following occurrences of the address have been implemented and tested. Do let me know if any are missing:

- Backend: Customer view default addresses display (on «Customer View» and «Addresses» tab)
- Backend: Order view
- Checkout: Shipping address in sidebar
- Registered customer checkout: Existing shipping address display
- Registered customer checkout: Billing address selection (dropdown)
- Registered customer checkout: Billing address display
- Customer account default addresses display
- Customer account address book addresses display
- Customer account order view addresses display
- Customer account order print
- Order confirmation email