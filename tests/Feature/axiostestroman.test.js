// Importa Axios
import axios from 'axios';

test('Test Get Axios', async () => {
    try {
        const response = await axios.get('https://romantest.mooo.com/getData');
        
        expect(response.status).toBe(200);

        expect(response.data).not.toBeNull();
    } catch (error) {
       
        
    }
});
