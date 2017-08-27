Feature: Test API
 
 As a behat user
 I want to test restful service
 So that i am sure to be able to use API

Scenario: Create an issue
  Given data:
  """
  {"title":"tt","description":"description"}
  """
  Given I "create data" in url "issues/" 
  Then the response should be JSON
  And the response status code should be 200
  And the "title" property equals "tt"

Scenario: Retrieve an issue
  Given I "retrieve data" in url "issues/1234" 
  Then the response should be JSON
  And the response status code should be 200
  And the "id" property equals 1234
  And the "verb" property equals "GET"

Scenario: Update an issue
  Given data:
  """
  {"title":"new tt","description":"description"}
  """
  Given I "update data" in url "issues/5487" 
  Then the response should be JSON
  And the response status code should be 200
  And the "id" property equals 5487
  And the "title" property equals "new tt"  
 
Scenario: Delete an issue
  Given I "delete data" in url "issues/1234" 
  Then the response should be JSON
  And the response status code should be 200
  And the "id" property equals 1234
  


