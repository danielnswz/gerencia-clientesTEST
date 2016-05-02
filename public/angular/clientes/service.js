'use strict';

clientGest.factory('Cliente', function ($http, $q) {

    return {
        /**
         * Obtiene el departamento
         *
         * @param id_departamento ID del departamento
         * @param id_sucursal ID de la sucursal
         * @param id_empresa ID de la empresa
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
         * Crea una nuevo Departamento
         *
         * @param departamento Modelo con los atributos de la departamento y la sucursal
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
         * Edita una departamento
         *
         * @param departamento Modelo con los atributos de la departamento y la sucursal
         * @return $promise
         */
        edit: function (cliente, callback) {
            var cb = callback || angular.noop;
            var defer = $q.defer();
            console.log('casi backend');
            console.log(cliente);
            return;
            $http.put('api/cliente/'+cliente.id, cliente)
                .success(function (data) {
                    defer.resolve(data);
                    return cb(data);
                })
                .error(function (errr) {
                    defer.reject(errr);
                    return cb(err);
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