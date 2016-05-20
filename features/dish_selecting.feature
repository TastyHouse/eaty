Feature: Hungry user selects the dish
  In order to select a dish
  As hungry user
  I should be able to choose from available dishes in menu of caterer

  Scenario: Hungry User selects from External Menu
  	Given There is open order for "Korova" caterer
	And "Korova" caterer has external menu
	When I add "VodkaBurger" as name and "28 zl" as price of a dish
	Then I should have "VodkaBurger" for "28 zl" selected as mine position in order