Feature: Administrator views past Orders
  In order to know what were the prices, selected Dishes and Hungry Users taking part in past Orders for each Caterer
  As Administrator
  I should be able to view that data for the all Orders ever taken, taking into account any changes (eg. price) in app

  Scenario: selecting Caterer to view his Past Orders
    Given I am an Administrator
    When I entered View Past Orders page
    Then I should be able to select Caterer for which past Orders should be shown

  Scenario: viewing Past Orders of Caterer
    Given I am an Administrator
    When I selected Caterer on Past Orders page
    Then I should be able to view the list of all Orders made to that Caterer

  Scenario: viewing single Order
    Given I am an Administrator
    When I selected single Order in Caterer's Past Orders page
    Then I should be able to view who ordered what and for how many in that Order