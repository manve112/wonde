# Wonde API Exercise

## Setup

1. Setup environment 

    `$ composer install` 

    `$ npm install && npm run production` 

2. Add required `.ENV` variables
   1. `WONDE_API_TOKEN` - API Token
   2. `WONDE_TEST_SCHOOL` - Token for test school
3. Serve website `$ php artisan serve`

## With more time, the following could be achieved
1. Unit tests
2. Lessons shown
3. Addition of pagination
4. Improved styling
5. Redis caching
   1. Short time cache (e.g. 1 minute)
   2. This would reduce API requests for the same endpoints
      1. For example, fetching the same class by clicking "Select" button multiple times
   3. This would also display results quicker, due to already having them stored in memory


### Time taken: 2-3h
