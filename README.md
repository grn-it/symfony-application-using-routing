# Symfony Application Using Routing

Sample of how to use routing in a Symfony web application.  

The main meaning of these sample is in the configuration and routing settings, and not in the business logic, so the actions in the controllers have pseudo-code as comments.  

The API describes features of a product catalog in an online store.  

List of entities that are used in this API:
- Catalog
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

List of available routes:
```bash
symfony console debug:router
```
```bash
 -------------------------------- -------- -------- ------ ---------------------------- 
  Name                             Method   Scheme   Host   Path                        
 -------------------------------- -------- -------- ------ ---------------------------- 
  catalog_categories_list          GET      ANY      ANY    /catalog/categories/        
  catalog_products_list            GET      ANY      ANY    /catalog/products/          
  catalog_reviews_list             GET      ANY      ANY    /catalog/reviews/           
  _preview_error                   ANY      ANY      ANY    /_error/{code}.{_format}    
  catalog_category_products_list   GET      ANY      ANY    /catalog/{category}         
  catalog_categories_item          GET      ANY      ANY    /catalog/categories/{uuid}  
  catalog_categories_add           POST     ANY      ANY    /catalog/categories/        
  catalog_categories_edit          PUT      ANY      ANY    /catalog/categories/{uuid}  
  catalog_categories_delete        DELETE   ANY      ANY    /catalog/categories/{uuid}  
  catalog_products_search          GET      ANY      ANY    /catalog/products/          
  catalog_products_item            GET      ANY      ANY    /catalog/products/{uuid}    
  catalog_products_add             POST     ANY      ANY    /catalog/products/          
  catalog_products_edit            PUT      ANY      ANY    /catalog/products/{uuid}    
  catalog_products_delete          DELETE   ANY      ANY    /catalog/products/{uuid}    
  catalog_reviews_item             GET      ANY      ANY    /catalog/reviews/{uuid}     
  catalog_reviews_add              POST     ANY      ANY    /catalog/reviews/           
  catalog_reviews_edit             PUT      ANY      ANY    /catalog/reviews/{uuid}     
  catalog_reviews_delete           DELETE   ANY      ANY    /catalog/reviews/{uuid}     
 -------------------------------- -------- -------- ------ ----------------------------
```

Let's take a closer look at how each controller for an entity is arranged and how the route works.  

## Catalog
IN PROGRESS...
