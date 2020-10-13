import { http } from './config'

export default{ 
    find:()=>{
        return http.get('paciente')
    }
}