import Avro from 'nodejs-avro-phonetic';

// Common English words mapping to correct Bangla
const customMapping = {
    'hello': 'হ্যালো',
    'hi': 'হাই',
    'how': 'হাউ',
    'are': 'আর',
    'you': 'ইউ',
    'the': 'দ্য',
    'to': 'টু',
    'for': 'ফর',
    'and': 'অ্যান্ড',
    'is': 'ইজ',
    'my': 'মাই',
    'name': 'নেম',
};

// Enhanced parse function with custom mapping
window.Avro = {
    parse: function (text) {
        if (!text) return '';

        // Split by words to check mapping
        let words = text.split(/(\s+)/);
        let processedWords = words.map(word => {
            let lowerWord = word.toLowerCase().trim();
            if (customMapping[lowerWord]) {
                return customMapping[lowerWord];
            }
            // If not in mapping, use standard Avro
            return Avro.parse(word);
        });

        return processedWords.join('');
    }
};
