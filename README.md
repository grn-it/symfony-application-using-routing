# Symfony Application Using Routing

Sample of how to use routing in a Symfony web application.  

The main meaning of these sample is in the configuration and routing settings, and not in the business logic, so the actions in the controllers have pseudo-code as comments.  

The API describes features of a product catalog in an online store.  

List of entities that are used in this API:
- Category
- Product
- Review

Entities don't really exist, only controllers and actions are designed.

The routing configuration for the controllers:  
```yaml
# /config/routes.yaml
controllers:
    resource: ../src/Controller/Catalog
    type: attribute
    prefix: '/catalog'
    name_prefix: 'catalog_'
    trailing_slash_on_root: false
```

This means that the routes for all controllers in the `src/Controller/Catalog` directory will be prefixed with `/catalog`, so this prefix can be omitted in the controllers.  
The `/catalog` prefix is needed to separate the catalog section with products from other sections of the site such as `/blog`, `/news`, `/docs`, `/contacts`, `/about-us`.  

List of available routes:
```bash
symfony console debug:router
```
```bash
 --------------------------- -------- -------- ------ ---------------------------- 
  Name                        Method   Scheme   Host   Path                        
 --------------------------- -------- -------- ------ ---------------------------- 
  _preview_error              ANY      ANY      ANY    /_error/{code}.{_format}    
  catalog_categories_list     GET      ANY      ANY    /catalog/categories         
  catalog_categories_item     GET      ANY      ANY    /catalog/categories/{uuid}  
  catalog_categories_add      POST     ANY      ANY    /catalog/categories         
  catalog_categories_edit     PUT      ANY      ANY    /catalog/categories/{uuid}  
  catalog_categories_delete   DELETE   ANY      ANY    /catalog/categories/{uuid}  
  catalog_products_list       GET      ANY      ANY    /catalog/products           
  catalog_products_item       GET      ANY      ANY    /catalog/products/{uuid}    
  catalog_products_add        POST     ANY      ANY    /catalog/products           
  catalog_products_edit       PUT      ANY      ANY    /catalog/products/{uuid}    
  catalog_products_delete     DELETE   ANY      ANY    /catalog/products/{uuid}    
  catalog_reviews_list        GET      ANY      ANY    /catalog/reviews            
  catalog_reviews_item        GET      ANY      ANY    /catalog/reviews/{uuid}     
  catalog_reviews_add         POST     ANY      ANY    /catalog/reviews            
  catalog_reviews_edit        PUT      ANY      ANY    /catalog/reviews/{uuid}     
  catalog_reviews_delete      DELETE   ANY      ANY    /catalog/reviews/{uuid}     
 --------------------------- -------- -------- ------ ----------------------------
```

## Category Controller
```php
// src/Controller/Catalog/CategoryController.php

#[Route('/categories', name: 'categories_')]
class CategoryController extends AbstractController
{
    /**
     * Return list of categories
     * 
     * Matches method and path: GET /catalog/categories
     */
    #[Route(
        '',
        'list',
        methods: ['GET']
    )]
    public function list(): JsonResponse
    {
        // make request to Category repository
        // if categories is empty return empty array
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Return single Category
     * 
     * Matches method and path: GET /catalog/categories/7ea27a43-b587-4baa-83c1-aa4ee52db2a1
     */
    #[Route(
        '/{uuid}',
        'item',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['GET']
    )]
    public function item(string $uuid): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Add new Category
     * 
     * Matches method and path: POST /catalog/categories
     */
    #[Route(
        '',
        'add',
        methods: ['POST'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function add(Request $request): JsonResponse
    {
        // deserialize data from Request to Category object
        // validate Category object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist to database
        // return HTTP 201 (Created)
        
        return $this->json([]);
    }

    /**
     * Edit Category
     * 
     * Matches method and path: PUT /catalog/categories/16793782-d36c-4b6a-97d4-2e6c1fba8782
     */
    #[Route(
        '/{uuid}',
        'edit',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['PUT'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function edit(string $uuid, Request $request): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // deserialize data from Request and populate to exist Category object
        // validate Category object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist edited Category object to database
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }

    /**
     * Delete Category
     * 
     * Matches method and path: DELETE /catalog/categories/2a54a70a-0765-4d0d-99b3-b57a30d3ed67
     */
    #[Route(
        '/{uuid}',
        'delete',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['DELETE']
    )]
    public function delete(string $uuid): JsonResponse
    {
        // make find request to Category repository
        // if category not found return HTTP 404 (Not Found)
        // delete Category from database
        // return HTTP 200 (OK)
        
        return $this->json([]);
    }
}
```

## Product Controller
```php
// src/Controller/Catalog/ProductController.php

#[Route('/products', 'products_')]
class ProductController extends AbstractController
{
    /**
     * Return list of products
     * 
     * Matches method and path: GET /catalog/products
     * 
     * Returns a list of filtered products by "jeans" category
     * Matches method and path: GET /catalog/products?categories[]=jeans
     * 
     * Returns a list of found products by word "nike" in the title, description or characteristic of the product
     * Matches method and path: GET /catalog/products?search=nike
     */
    #[Route(
        '',
        'list',
        methods: ['GET']
    )]
    public function list(Request $request): JsonResponse
    {
        // make get/filter/search request to Product repository
        // if products is empty return empty array
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Return single Product
     * 
     * Matches method and path: GET /catalog/products/756ab18c-31a1-4981-b8d0-67eb8f195e80
     */
    #[Route(
        '/{uuid}',
        'item',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['GET']
    )]
    public function item(string $uuid): JsonResponse
    {
        // make find request to Product repository
        // if Product not found return HTTP 404 (Not Found)
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Add new Product
     * 
     * Matches method and path: POST /catalog/products
     */
    #[Route(
        '',
        'add',
        methods: ['POST'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function add(Request $request): JsonResponse
    {
        // deserialize data from Request to Product object
        // validate Product object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist to database
        // return HTTP 201 (Created)

        return $this->json([]);
    }

    /**
     * Edit Product
     * 
     * Matches method and path: PUT /catalog/products/3f3652c1-990a-4b5c-bb36-0222df2b09e1
     */
    #[Route(
        '/{uuid}',
        'edit',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['PUT'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function edit(string $uuid, Request $request): JsonResponse
    {
        // make find request to Product repository
        // if Product not found return HTTP 404 (Not Found)
        // deserialize data from Request and populate to exist Product object
        // validate Product object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist edited Product object to database
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Delete Product
     * 
     * Matches method and path: DELETE /catalog/products/a3494f19-5079-4841-854e-63416dd54de5
     */
    #[Route(
        '/{uuid}',
        'delete',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['DELETE']
    )]
    public function delete(string $uuid): JsonResponse
    {
        // make find request to Product repository
        // if Product not found return HTTP 404 (Not Found)
        // delete Product from database
        // return HTTP 200 (OK)

        return $this->json([]);
    }
}
```

## Review Controller
```php
// src/Controller/Catalog/ReviewController.php

#[Route('/reviews', 'reviews_')]
class ReviewController extends AbstractController
{
    /**
     * Return list of review
     * 
     * Matches method and path: GET /catalog/reviews
     * 
     * Returns a list of reviews for the product with UUID "cdedec98-d702-422d-9e34-dc624990331c"
     * Matches method and path: GET /catalog/reviews?product=cdedec98-d702-422d-9e34-dc624990331c
     */
    #[Route(
        '',
        'list',
        methods: ['GET']
    )]
    public function list(): JsonResponse
    {
        // make get/filter request to Review repository
        // if reviews is empty return empty array
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Return single Review
     * 
     * Matches method and path: GET /catalog/reviews/71ca5f0a-7e45-44e5-85fe-252d25ffb45e
     */
    #[Route(
        '/{uuid}',
        'item',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['GET']
    )]
    public function item(string $uuid): JsonResponse
    {
        // make find request to Review repository
        // if Review not found return HTTP 404 (Not Found)
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Add new Review
     * 
     * Matches method and path: POST /catalog/reviews
     */
    #[Route(
        '',
        'add',
        methods: ['POST'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function add(Request $request): JsonResponse
    {
        // deserialize data from Request to Review object
        // validate Review object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist to database
        // return HTTP 201 (Created)

        return $this->json([]);
    }

    /**
     * Edit Review
     * 
     * Matches method and path: PUT /catalog/reviews/6300fae7-645f-4f1a-a558-fb68f7a00ec2
     */
    #[Route(
        '/{uuid}',
        'edit',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['PUT'],
        condition: "service('app.routing.condition.checker').isRequestBodyNotEmpty(request)"
    )]
    public function edit(string $uuid, Request $request): JsonResponse
    {
        // make find request to Review repository
        // if Review not found return HTTP 404 (Not Found)
        // deserialize data from Request and populate to exist Review object
        // validate Review object data (if validation fail return error message with status HTTP 400 (Bad Request))
        // persist edited Review object to database
        // return HTTP 200 (OK)

        return $this->json([]);
    }

    /**
     * Delete Review
     * 
     * Matches method and path: DELETE /catalog/reviews/ebd7b29c-d900-4f70-a5e1-0dc8e547bc0d
     */
    #[Route(
        '/{uuid}',
        'delete',
        requirements: ['uuid' => Requirement::UUID],
        methods: ['DELETE']
    )]
    public function delete(string $uuid): JsonResponse
    {
        // make find request to Review repository
        // if Review not found return HTTP 404 (Not Found)
        // delete Review from database
        // return HTTP 200 (OK)

        return $this->json([]);
    }
}
```

## Resources
Symfony documentation: [Routing](https://symfony.com/doc/current/routing.html)  
