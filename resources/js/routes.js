const ParkingList = () => import('./components/parking/List.vue' /* webpackChunkName: "resource/js/components/parking/list" */)
const ParkingCreate = () => import('./components/parking/Add.vue' /* webpackChunkName: "resource/js/components/parking/add" */)
const ParkingEdit = () => import('./components/parking/Edit.vue' /* webpackChunkName: "resource/js/components/parking/edit" */)

export const routes = [
    {
        name: 'parkingList',
        path: '/parking',
        component: ParkingList
    },
    {
        name: 'parkingEdit',
        path: '/parking/:id/edit',
        component: ParkingEdit
    },
    {
        name: 'parkingAdd',
        path: '/parking/add',
        component: ParkingCreate
    }
]
