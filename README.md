# Symfony Application Using Routing

Simple examples of how to use routing in a Symfony web application.  

The main meaning of these samples is in the configuration and routing settings, and not in the business logic, so the actions in the controllers have pseudo-code in the form of comments.  

The developed API describes how a simple online store product catalog could work.  

List of entities (pseudo) that are used in this API:
- Catalog
- Category
- Product
- Review

The routing configuration for the controllers is set up like this.  
```yaml
controllers:
    resource: ../src/Controller/Catalog
    type: attribute
    prefix: '/catalog'
    name_prefix: 'catalog_'
    trailing_slash_on_root: false
```

This means that the routes for all controllers in the src/Controller/Catalog directory will be prefixed with "/catalog", so this prefix can be omitted in the controllers themselves.  

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
