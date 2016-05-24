Feature: Administrator manages Caterer's additional costs
  In order to have Caterers additional costs added to future Orders
  As Administrator
  I should be able to input Caterer Delivery Cost and Additional Costs (eg. packaging cost) (if present)

  Scenario: Setting Delivery Cost for Caterer
    Given Caterer has Delivery Cost for Order
    When I am adding or editing that Caterer
    Then I should be able to input Delivery Cost for that Caterer

  Scenario: Setting Additional Costs for Caterer
    Given Caterer has Additional Costs for Order
    When I am adding or editing that Caterer
    Then I should be able to input those Additional Costs for that Caterer