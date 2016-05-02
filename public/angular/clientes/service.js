'use strict';

clientGest.factory('Cliente', function ($http, $q) {

    return {
        /**
         * Obtiene el cliente
         *
         * @param id_cliente ID del cliente
         * @return $promise
         */
        get: function (id_cliente, callback) {
            var cb = callback || angular.noop;
            var defer = $q.defer();

            $http.get('api/cliente/'+id_cliente)
                .success(function (data) {
                    defer.resolve(data);
                    return cb(data);
                })
                .error(function (err) {
                    defer.reject(err);
                    return cb(err);
                });

            return defer.promise;
        },
        /**
         * Crea una nuevo cliente
         *
         * @param cliente Modelo con los atributos del cliente
         * @return $promise
         */
        create: function (cliente, callback) {

            var cb = callback || angular.noop;
            var defer = $q.defer();

            $http.post('api/cliente/', cliente)
                .success(function (data) {
                    defer.resolve(data);
                    return cb(data);
                })
                .error(function (err) {
                    defer.reject(err);
                    return cb(err);
                });

            return defer.promise;
        },

        /**
         * Edita un cliente
         *
         * @param cliente Modelo con los atributos del cliente
         * @return $promise
         */
        edit: function (cliente, callback) {
            var cb = callback || angular.noop;
            var defer = $q.defer();
            $http.put('api/cliente/'+cliente.id, cliente)
                .success(function (data) {
                    defer.resolve(data);
                    return cb(data);
                })
                .error(function (errr) {
                    defer.reject(errr);
                    return cb(errr);
                });

            return defer.promise;
        },

        /**
         * Elimina un cliente
         *
         * @param cliente
         * @param $promise
         */
        delete: function (cliente, callback) {
            var cb = callback || angular.noop;
            var defer = $q.defer();

            $http.delete('api/cliente/'+cliente.id)
                .success(function (data) {
                    defer.resolve(data);
                    return cb(data);
                })
                .error(function (err) {
                    defer.reject(err);
                    return cb(err);
                });

            return defer.promise;
        }
    };
});